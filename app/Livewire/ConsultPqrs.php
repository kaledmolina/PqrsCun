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
        $this->pqrs = Pqrs::where('cun', $data['cun'])->first();
        $this->notFound = !$this->pqrs;
    }

    public function render()
    {
        return view('livewire.consult-pqrs');
    }
}
