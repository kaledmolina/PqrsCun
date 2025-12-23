<?php

namespace App\Livewire;

use App\Models\Pqrs;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePqrs extends Component
{
    use WithFileUploads;

    // Propiedades públicas
    public $successCun = '';
    public $attachments = [];
    public $previous_cun = '';
    public $validPreviousCun = false;
    public $parentPqrsId = null;
    
    // Datos del formulario
    public $data = [
        'department' => 'Boyacá',
        'operator' => 'Intalnet',
        'city' => '',
        'type' => '',
        'document_type' => '',
        'contract_number' => '',
        'services' => [],
        'address' => '',
        'landline' => '',
        'email_confirmation' => '',
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'phone' => '',
        'document_number' => '',
        'motive' => '',
        'description' => '',
        'data_treatment_accepted' => false,
        'authorize_email_documents' => false,
        'typology' => '',
        'sub_typology' => '',
    ];

    const TYPOLOGIES = [
        'Facturación' => [
            'Cobros no reconocidos',
            'Doble facturación',
            'Factura no entregada',
            'Errores en el valor facturado',
        ],
        'Calidad del servicio' => [
            'Interrupciones frecuentes',
            'Lentitud o baja velocidad (en internet)',
            'Caídas de señal',
            'Mala calidad de audio o video',
        ],
        'Atención al usuario' => [
            'Mal trato del personal',
            'Falta de respuesta oportuna',
            'Información errónea o incompleta',
        ],
        'Suspensión o corte del servicio' => [
            'Corte sin previo aviso',
            'Suspensión injustificada',
            'No reconexión tras pago',
        ],
        'Instalación y activación' => [
            'Retrasos en la instalación',
            'Incumplimiento de fechas',
            'Activación incompleta',
        ],
        'Terminación del contrato' => [
            'Dificultades para cancelar el servicio',
            'Cargos posteriores a la cancelación',
        ],
        'Promociones y ofertas' => [
            'Publicidad engañosa',
            'Condiciones no informadas',
            'No aplicación de descuentos',
        ],
        'Otros' => [
            'Quejas no clasificables en las categorías anteriores',
        ],
    ];

    protected function rules()
    {
        $rules = [
            'data.type' => 'required|in:peticion,queja_reclamo,peticion,queja,reclamo,sugerencia,recurso_subsidio',
            'previous_cun' => 'required_if:data.type,recurso_subsidio',
            'data.description' => 'required',
            // Data treatment is required unless type is recurso_subsidio
            'data.data_treatment_accepted' => $this->data['type'] === 'recurso_subsidio' ? 'nullable' : 'accepted',
            'data.authorize_email_documents' => 'boolean',
            'attachments.*' => 'nullable|file|max:51200', // 50MB max
            'data.typology' => 'required_if:data.type,queja_reclamo',
            'data.sub_typology' => 'required_if:data.type,queja_reclamo',
        ];

        // If it's NOT a valid resource subsidy flow (which implies data is auto-filled)
        // We only require full validation if the user is manually entering data.
        if (($this->data['type'] ?? '') !== 'recurso_subsidio') {
            $rules = array_merge($rules, [
                'data.contract_number' => 'nullable|max:255',
                'data.document_type' => 'required|in:CC,TI,CE,NIT,PAS',
                'data.document_number' => 'required|max:255',
                'data.first_name' => 'required|max:255',
                'data.last_name' => $this->data['document_type'] === 'NIT' ? 'nullable|max:255' : 'required|max:255',
                'data.services' => 'nullable|array',
                'data.email' => 'nullable|email|confirmed|max:255',
                'data.phone' => 'nullable|max:255',
                'data.address' => 'required|max:255',
                'data.city' => 'required|max:255',
                'data.landline' => 'nullable|max:255',
                'data.motive' => 'nullable|max:255',
            ]);
        }

        return $rules;
    }

    protected $validationAttributes = [
        'data.contract_number' => 'número de contrato',
        'data.document_type' => 'tipo de documento',
        'data.document_number' => 'número de documento',
        'data.first_name' => 'nombres',
        'data.last_name' => 'apellidos',
        'data.type' => 'tipo de solicitud',
        'data.services' => 'servicios',
        'data.email' => 'correo electrónico',
        'data.email_confirmation' => 'confirmación de correo',
        'data.phone' => 'número celular',
        'data.address' => 'dirección física',
        'data.city' => 'ciudad/sede',
        'data.landline' => 'teléfono fijo',
        'data.motive' => 'motivo',
        'data.description' => 'descripción de la solicitud',
        'data.data_treatment_accepted' => 'política de tratamiento de datos',
        'attachments' => 'archivos adjuntos',
        'previous_cun' => 'CUN anterior',
    ];

    protected $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'email' => 'El campo :attribute debe ser una dirección de correo válida.',
        'max' => 'El campo :attribute no debe exceder :max caracteres.',
        'in' => 'El seleccionado en :attribute no es válido.',
        'accepted' => 'Debes aceptar :attribute para continuar.',
        'confirmed' => 'La confirmación de :attribute no coincide.',
        'required_if' => 'El campo :attribute es obligatorio cuando el tipo es :value.',
    ];

    // Listen for updates to previous_cun
    public function updatedPreviousCun()
    {
        $this->validatePreviousCun();
    }

    public function validatePreviousCun()
    {
        if (empty($this->previous_cun)) {
            $this->validPreviousCun = false;
            $this->parentPqrsId = null;
            return;
        }

        $searchCun = trim($this->previous_cun);

        // Allow search without hyphens (e.g., 7714250000000001 -> 7714-25-0000000001)
        if (ctype_digit($searchCun) && strlen($searchCun) === 16) {
            $searchCun = sprintf(
                '%s-%s-%s',
                substr($searchCun, 0, 4),
                substr($searchCun, 4, 2),
                substr($searchCun, 6)
            );
            // Optionally update the visible input to the formatted version
            $this->previous_cun = $searchCun;
        }

        $parentPqrs = Pqrs::where('cun', $searchCun)->first();

        // Validate existence and status
        if (!$parentPqrs) {
            $this->addError('previous_cun', 'El CUN ingresado no existe.');
            $this->validPreviousCun = false;
            $this->parentPqrsId = null;
            return;
        }

        // Check if resolved or closed (logic: 15 business days passed or status is finalized)
        // For now, checking status is safer + assumption mentioned in prompt
        if (!in_array($parentPqrs->status, ['resolved', 'closed'])) {
             // Optional: check deadline_at < now() if status isn't reliable enough
            $this->addError('previous_cun', 'El PQR asociado debe estar cerrado o resuelto.');
            $this->validPreviousCun = false;
            $this->parentPqrsId = null;
            return;
        }

        // Autofill data
        $this->validPreviousCun = true;
        $this->parentPqrsId = $parentPqrs->id;
        
        $this->data['first_name'] = $parentPqrs->first_name;
        $this->data['last_name'] = $parentPqrs->last_name;
        $this->data['document_type'] = $parentPqrs->document_type;
        $this->data['document_number'] = $parentPqrs->document_number;
        $this->data['email'] = $parentPqrs->email;
        $this->data['email_confirmation'] = $parentPqrs->email;
        $this->data['phone'] = $parentPqrs->phone;
        $this->data['landline'] = $parentPqrs->landline;
        $this->data['address'] = $parentPqrs->address;
        $this->data['city'] = $parentPqrs->city;
        $this->data['contract_number'] = $parentPqrs->contract_number;
        $this->data['services'] = $parentPqrs->services ?? [];
        
        // Clear errors if any
        $this->resetErrorBag('previous_cun');
    }

    // Helper to generate CUN
    private function generateCun()
    {
        $year = date('y'); // 2-digit year
        $type = $this->data['type'];
        
        // Determine prefix
        // Determine prefix
        $prefix = ($type === 'sugerencia' || $type === 'recurso_subsidio') ? 'RAD' : \App\Models\Setting::where('key', 'cun_provider_code')->value('value') ?? '7714';
        
        // Find the last CUN with this prefix and year to determine the sequence
        $lastPqrs = Pqrs::where('cun', 'like', "{$prefix}-{$year}-%")
            ->orderBy('cun', 'desc')
            ->first();

        $sequence = 1;
        
        if ($lastPqrs) {
            // Extract the sequence number from the last CUN
            $parts = explode('-', $lastPqrs->cun);
            if (count($parts) === 3) {
                $sequence = intval($parts[2]) + 1;
            }
        }
        
        $sequenceStr = str_pad($sequence, 10, '0', STR_PAD_LEFT);
        
        return "{$prefix}-{$year}-{$sequenceStr}";
    }

    public function save()
    {
        // Special validation trigger for Recurso
        if ($this->data['type'] === 'recurso_subsidio') {
            $this->validatePreviousCun();
            if (!$this->validPreviousCun) {
                return; // Stop if invalid
            }
        }

        $this->validate();

        $cun = $this->generateCun();

        // Handle file uploads
        $attachmentPaths = [];
        foreach ($this->attachments as $attachment) {
            $attachmentPaths[] = $attachment->store('pqrs-attachments', 'public');
        }

        // Map $this->data to individual properties for Pqrs::create
        $pqrs = Pqrs::create([
            'type' => $this->data['type'] ?? '',
            'first_name' => $this->data['first_name'] ?? '',
            'last_name' => $this->data['last_name'] ?? '',
            'email' => $this->data['email'] ?? '',
            'phone' => $this->data['phone'] ?? '',
            'document_type' => $this->data['document_type'] ?? '',
            'document_number' => $this->data['document_number'] ?? '',
            'landline' => $this->data['landline'] ?? '',
            'address' => $this->data['address'] ?? '',
            'city' => $this->data['city'] ?? '',
            'contract_number' => $this->data['contract_number'] ?? '',
            'services' => $this->data['services'] ?? [],
            'motive' => $this->data['motive'] ?? '',
            'description' => $this->data['description'] ?? '',
            'attachments' => $attachmentPaths, 
            'cun' => $cun,
            'status' => 'pending',
            'data_treatment_accepted' => $this->data['data_treatment_accepted'] ?? false,
            'authorize_email_documents' => $this->data['authorize_email_documents'] ?? false,
            'typology' => $this->data['typology'] ?? null,
            'sub_typology' => $this->data['sub_typology'] ?? null,
            'parent_pqrs_id' => $this->parentPqrsId, // Link original PQR
        ]);

        // --- Automatic Quick Response ---
        try {
            $service = new \App\Services\PqrsResponseService();
            $content = $service->getQuickResponseTemplate($pqrs, $pqrs->type);
            
            // Create Message (System/Admin role)
            // No PDF generated for automatic receipt acknowledgment
            $pqrs->messages()->create([
                'role' => 'admin',
                'content' => $content,
                'attachments' => [], 
            ]);

            // Update Status
            $pqrs->update(['status' => 'in_progress']);

            // Send Email (without PDF attachment)
            if ($pqrs->email) {
                \Illuminate\Support\Facades\Mail::to($pqrs->email)->send(new \App\Mail\PqrsResponseMail(
                    $pqrs,
                    $content,
                    [], // No attachments
                    'Confirmación de Radicación de PQR – Intalnet Telecomunicaciones'
                ));
            }
        } catch (\Exception $e) {
            // Log error but allow flow to continue so the user sees the success CUN
            \Illuminate\Support\Facades\Log::error('Error sending auto-response for PQR ' . $cun . ': ' . $e->getMessage());
        }

        // Guardar el CUN generado para mostrarlo en la vista
        $this->successCun = $cun;
        
        // Reset form data and attachments
        $this->reset(['data', 'attachments', 'previous_cun', 'validPreviousCun', 'parentPqrsId']);
        
        // Re-inicializar valores por defecto después del reset
        $this->data = [
            'department' => 'Boyacá',
            'operator' => 'Intalnet',
            'city' => '',
            'type' => '',
            'document_type' => '',
            'contract_number' => '',
            'services' => [],
            'address' => '',
            'landline' => '',
            'email_confirmation' => '',
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'phone' => '',
            'document_number' => '',
            'motive' => '',
            'description' => '',
            'data_treatment_accepted' => false,
            'authorize_email_documents' => false,
            'typology' => '',
            'sub_typology' => '',
        ];
    }
    
    // Método para limpiar el estado de éxito y volver al formulario
    public function resetSuccess()
    {
        $this->successCun = '';
    }

    public function removeAttachment($index)
    {
        array_splice($this->attachments, $index, 1);
    }

    public function updatedAttachments()
    {
        $this->validate([
            'attachments.*' => 'file|max:51200',
        ]);
    }

    public function render()
    {
        return view('livewire.create-pqrs');
    }
}