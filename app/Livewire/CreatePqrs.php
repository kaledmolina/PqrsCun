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
        return [
            'data.contract_number' => 'nullable|max:255',
            'data.document_type' => 'required|in:CC,TI,CE,NIT,PAS',
            'data.document_number' => 'required|max:255',
            'data.first_name' => 'required|max:255',
            'data.last_name' => $this->data['document_type'] === 'NIT' ? 'nullable|max:255' : 'required|max:255',
            'data.type' => 'required|in:peticion,queja_reclamo,peticion,queja,reclamo,sugerencia,recurso_subsidio',
            'data.typology' => 'required_if:data.type,queja_reclamo',
            'data.sub_typology' => 'required_if:data.type,queja_reclamo',
            'data.services' => 'nullable|array',
            'data.email' => 'nullable|email|confirmed|max:255',
            'data.phone' => 'nullable|max:255',
            'data.address' => 'required|max:255',
            'data.city' => 'required|max:255',
            'data.landline' => 'nullable|max:255',
            'data.motive' => 'nullable|max:255',
            'data.description' => 'required',
            'data.data_treatment_accepted' => 'accepted',
            'data.authorize_email_documents' => 'boolean',
            'data.authorize_email_documents' => 'boolean',
            'attachments.*' => 'nullable|file|max:51200', // 50MB max
        ];
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
    ];

    protected $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'email' => 'El campo :attribute debe ser una dirección de correo válida.',
        'max' => 'El campo :attribute no debe exceder :max caracteres.',
        'in' => 'El seleccionado en :attribute no es válido.',
        'accepted' => 'Debes aceptar :attribute para continuar.',
        'confirmed' => 'La confirmación de :attribute no coincide.',
    ];

    // Helper to generate CUN
    private function generateCun()
    {
        $year = date('y'); // 2-digit year
        $type = $this->data['type'];
        
        // Determine prefix
        // Determine prefix
        $prefix = ($type === 'sugerencia') ? 'RAD' : \App\Models\Setting::where('key', 'cun_provider_code')->value('value') ?? '7714';
        
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
        $this->validate();

        $cun = $this->generateCun();

        // Handle file uploads
        $attachmentPaths = [];
        foreach ($this->attachments as $attachment) {
            $attachmentPaths[] = $attachment->store('pqrs-attachments', 'local');
        }

        // Map $this->data to individual properties for Pqrs::create
        Pqrs::create([
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
            'cun' => $cun,
            'status' => 'pending',
            'data_treatment_accepted' => $this->data['data_treatment_accepted'] ?? false,
            'authorize_email_documents' => $this->data['authorize_email_documents'] ?? false,
            'typology' => $this->data['typology'] ?? null,
            'sub_typology' => $this->data['sub_typology'] ?? null,
        ]);

        // Guardar el CUN generado para mostrarlo en la vista
        $this->successCun = $cun;
        
        // Reset form data and attachments
        $this->reset(['data', 'attachments']);
        
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