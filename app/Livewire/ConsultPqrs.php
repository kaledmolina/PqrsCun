<?php

namespace App\Livewire;

use App\Models\Pqrs;
use Livewire\Component;
use Livewire\WithFileUploads;
use Filament\Notifications\Notification;
use App\Models\User;



class ConsultPqrs extends Component
{
    use WithFileUploads;

    public $data = [
        'cun' => '',
    ];
    
    public $pqrs = null;
    public $notFound = false;
    
    // Reply form data
    public $replyContent = '';
    public $replyAttachments = [];

    protected function rules()
    {
        return [
            'data.cun' => 'required|string|max:255',
        ];
    }

    public function search()
    {
        $this->validate([
            'data.cun' => 'required|string|max:255',
        ]);

        $this->pqrs = Pqrs::with('messages')->where('cun', $this->data['cun'])->first();
        $this->notFound = !$this->pqrs;
    }

    public function submitReply()
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

        // Notify Admins
        Notification::make()
            ->title('Nueva respuesta en PQR')
            ->body("El cliente {$this->pqrs->first_name} {$this->pqrs->last_name} ha respondido a la PQR {$this->pqrs->cun}.")
            ->actions([
                \Filament\Notifications\Actions\Action::make('view')
                    ->label('Ver PQR')
                    ->url(\App\Filament\Resources\PqrsResource::getUrl('edit', ['record' => $this->pqrs])),
            ])
            ->sendToDatabase(User::all());

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
