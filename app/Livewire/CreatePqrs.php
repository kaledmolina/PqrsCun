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
    ];

    protected function rules()
    {
        return [
            'data.contract_number' => 'nullable|max:255',
            'data.document_type' => 'required|in:CC,TI,CE,NIT,PAS',
            'data.document_number' => 'required|max:255',
            'data.first_name' => 'required|max:255',
            'data.last_name' => 'required|max:255',
            'data.type' => 'required|in:peticion,queja,reclamo,sugerencia,reposicion,apelacion',
            'data.services' => 'nullable|array',
            'data.email' => 'required|email|confirmed|max:255',
            'data.phone' => 'required|max:255',
            'data.address' => 'required|max:255',
            'data.city' => 'required|max:255',
            'data.landline' => 'nullable|max:255',
            'data.motive' => 'nullable|max:255',
            'data.description' => 'required',
            'attachments.*' => 'nullable|file|max:10240', // 10MB max
        ];
    }

    // Helper to generate CUN
    private function generateCun()
    {
        $year = date('y'); // 2-digit year
        $type = $this->data['type'];
        
        // Determine prefix
        // Determine prefix
        $prefix = ($type === 'sugerencia') ? 'RAD' : \App\Models\Setting::where('key', 'cun_provider_code')->value('value') ?? '4436';
        
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
        ];
    }
    
    // Método para limpiar el estado de éxito y volver al formulario
    public function resetSuccess()
    {
        $this->successCun = '';
    }

    public function render()
    {
        return view('livewire.create-pqrs');
    }
}