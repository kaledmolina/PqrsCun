<?php

namespace App\Livewire;

use App\Models\Pqrs;
use Livewire\Component;
use Livewire\WithFileUploads;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use App\Filament\Resources\PqrsResource;
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

    // Survey data
    public $rating = null;
    public $feedback = '';
    public $showSurvey = false;

    public function mount()
    {
        //
    }

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

    public function canReply()
    {
        if (!$this->pqrs) return false;
        
        if ($this->pqrs->status === 'closed') return false;
        
        // If no messages, client can send the first one (actually description is the first one, but messages table stores chat)
        if ($this->pqrs->messages->isEmpty()) return true;

        // Get the last message
        $lastMessage = $this->pqrs->messages->sortByDesc('created_at')->first();

        // Client can only reply if the last message is from admin
        return $lastMessage->role === 'admin';
    }

    public function submitReply()
    {
        if (!$this->pqrs) {
            return;
        }

        if (!$this->canReply()) {
            session()->flash('error', 'Debes esperar una respuesta del asesor antes de enviar otro mensaje.');
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
            ->body("El cliente ha respondido a la PQR: {$this->pqrs->cun}")
            ->actions([
                Action::make('ver')
                    ->url(PqrsResource::getUrl('edit', ['record' => $this->pqrs]))
            ])
            ->sendToDatabase(User::all());

        // Reset form and refresh messages
        $this->replyContent = '';
        $this->replyAttachments = [];
        $this->pqrs->refresh();
        
        session()->flash('message_sent', 'Tu respuesta ha sido enviada correctamente.');
    }

    public function openSurvey()
    {
        $this->showSurvey = true;
    }

    public function rateService()
    {
        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'nullable|string|max:1000',
        ]);

        if ($this->pqrs) {
            $this->pqrs->update([
                'rating' => $this->rating,
                'feedback' => $this->feedback,
            ]);
        }

        $this->showSurvey = false;
        session()->flash('message_sent', '¡Gracias por tu calificación!');
        
        $this->resetSession();
    }

    public function skipSurvey()
    {
        $this->showSurvey = false;
        $this->resetSession();
    }

    protected function resetSession()
    {
        $this->pqrs = null;
        $this->data['cun'] = '';
        $this->reset(['replyContent', 'replyAttachments', 'rating', 'feedback']);
    }

    public function render()
    {
        return view('livewire.consult-pqrs');
    }
}
