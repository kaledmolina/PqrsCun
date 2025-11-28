<?php

namespace App\Livewire;

use App\Models\Pqrs;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms;

class ConsultPqrs extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    public $pqrs = null;
    public $notFound = false;
    
    // Reply form data
    public ?array $replyData = [];

    public function mount(): void
    {
        $this->form->fill();
        $this->replyForm->fill();
    }

    protected function getForms(): array
    {
        return [
            'form',
            'replyForm',
        ];
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

    public function replyForm(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('content')
                    ->label('Responder')
                    ->placeholder('Escribe tu respuesta aquí...')
                    ->required()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'link',
                        'bulletList',
                        'orderedList',
                    ]),
                Forms\Components\FileUpload::make('attachments')
                    ->label('Adjuntar Archivos')
                    ->multiple()
                    ->maxSize(10240) // 10MB
                    ->directory('pqrs-attachments'),
            ])
            ->statePath('replyData');
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

        $data = $this->replyForm->getState();

        $this->pqrs->messages()->create([
            'role' => 'client',
            'content' => $data['content'],
            'attachments' => $data['attachments'],
        ]);

        // Reset form and refresh messages
        $this->replyForm->fill();
        $this->pqrs->refresh();
        
        // Optional: Flash success message
        session()->flash('message_sent', 'Tu respuesta ha sido enviada correctamente.');
    }

    public function render()
    {
        return view('livewire.consult-pqrs');
    }
}
