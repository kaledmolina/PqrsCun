<?php

namespace App\Livewire;

use App\Models\Pqrs;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePqrs extends Component
{
    use WithFileUploads;

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
    ];

    public $attachments = [];
    public $showSuccessModal = false;
    public $createdCun = '';

    protected function rules()
    {
        return [
            'data.contract_number' => 'nullable|max:255',
            'data.document_type' => 'required|in:CC,TI,CE,NIT,PAS',
            'data.document_number' => 'required|max:255',
            'data.first_name' => 'required|max:255',
            'data.last_name' => 'nullable|max:255',
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

    public function create()
    {
        $this->validate();

        // Handle file uploads
        $attachmentPaths = [];
        foreach ($this->attachments as $file) {
            $attachmentPaths[] = $file->store('pqrs_attachments', 'public');
        }
        $this->data['attachments'] = $attachmentPaths;

        // Create PQRS
        $pqrs = Pqrs::create($this->data);

        // Set success state
        $this->createdCun = $pqrs->cun;
        $this->showSuccessModal = true;
        
        // Reset form
        $this->reset(['data', 'attachments']);
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
        ];
    }

    public function render()
    {
        return view('livewire.create-pqrs');
    }
}
