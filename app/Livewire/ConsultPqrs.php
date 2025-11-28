<?php

namespace App\Livewire;

use App\Models\Pqrs;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms;

use Livewire\WithFileUploads;

class ConsultPqrs extends Component implements HasForms
{
    use InteractsWithForms;
    use WithFileUploads;

    public ?array $data = [];
    public $pqrs = null;
    public $notFound = false;
    
    // Reply form data
    public $replyContent = '';
    public $replyAttachments = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('cun')
                    ->label('Código CUN')
                    ->placeholder('Ingrese el código CUN (ej: 4436-24-0000000001)')
                    ->required()
                    ->maxLength(255),
            ])
            ->statePath('data');
    }

    public function search(): void
    {
        $data = $this->form->getState();
        $this->pqrs = Pqrs::with('messages')->where('cun', $data['cun'])->first();
        $this->notFound = !$this->pqrs;
    }

    public function submitReply(): void
    {
        if (!$this->pqrs) {
            return;
        }

        $this->validate([
            'replyContent' => 'required|string',
            'replyAttachments.*' => 'nullable|file|max:10240', // 10MB
        ]);

        $attachmentPaths = [];
        foreach ($this->replyAttachments as $attachment) {
            $attachmentPaths[] = $attachment->store('pqrs-attachments', 'public');
        }

        $this->pqrs->messages()->create([
            'role' => 'client',
            'content' => nl2br(e($this->replyContent)), // Convert newlines to BR and escape HTML
            'attachments' => $attachmentPaths,
        ]);

        // Reset form and refresh messages
        $this->replyContent = '';
        $this->replyAttachments = [];
        $this->pqrs->refresh();
        
        // Optional: Flash success message
        session()->flash('message_sent', 'Tu respuesta ha sido enviada correctamente.');
    }

    public function render()
    {
        return view('livewire.consult-pqrs');
    }
}
