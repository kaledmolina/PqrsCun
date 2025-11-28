<?php

namespace App\Livewire;

use App\Models\Pqrs;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Filament\Notifications\Notification;

class CreatePqrs extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Información del Cliente')
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                            ->label('Nombres / Razón Social')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('last_name')
                            ->label('Apellidos')
                            ->maxLength(255), // Optional for companies
                        Forms\Components\Select::make('document_type')
                            ->label('Tipo de Documento')
                            ->options([
                                'CC' => 'Cédula de Ciudadanía',
                                'CE' => 'Cédula de Extranjería',
                                'NIT' => 'NIT',
                                'PAS' => 'Pasaporte',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('document_number')
                            ->label('Número de Documento')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->label('Correo Electrónico')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->label('Teléfono')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('department')
                            ->label('Departamento')
                            ->default('Boyacá')
                            ->readOnly()
                            ->required(),
                        Forms\Components\Select::make('city')
                            ->label('Ciudad')
                            ->options([
                                'Tunja' => 'Tunja',
                                'Duitama' => 'Duitama',
                                'Sogamoso' => 'Sogamoso',
                                'Paipa' => 'Paipa',
                                'Chiquinquirá' => 'Chiquinquirá',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('operator')
                            ->label('Operador')
                            ->default('Intalnet')
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make('Detalles de la PQRS')
                    ->schema([
                        Forms\Components\Select::make('type')
                            ->label('Tipo de Solicitud')
                            ->options([
                                'peticion' => 'Petición',
                                'queja' => 'Queja',
                                'apelacion' => 'Recurso de Apelación',
                                'reposicion' => 'Recurso de Reposición',
                            ])
                            ->required()
                            ->live(),
                        Forms\Components\TextInput::make('subject_cun')
                            ->label('CUN a Apelar/Reponer')
                            ->required(fn (Forms\Get $get) => in_array($get('type'), ['apelacion', 'reposicion']))
                            ->visible(fn (Forms\Get $get) => in_array($get('type'), ['apelacion', 'reposicion']))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('motive')
                            ->label('Motivo')
                            ->required(fn (Forms\Get $get) => in_array($get('type'), ['peticion', 'queja']))
                            ->visible(fn (Forms\Get $get) => in_array($get('type'), ['peticion', 'queja']))
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->label('Descripción')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('attachments')
                            ->label('Anexos')
                            ->multiple()
                            ->columnSpanFull(),
                    ])->columns(2),
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $pqrs = Pqrs::create($data);

        Notification::make()
            ->title('PQRS Registrada exitosamente')
            ->body('Su código CUN es: ' . $pqrs->cun)
            ->success()
            ->send();
            
        // Redirect to success page or show modal
        // For now, let's flash the CUN to the session and redirect
        session()->flash('success_cun', $pqrs->cun);
        $this->redirect(route('home'));
    }

    public function render()
    {
        return view('livewire.create-pqrs');
    }
}
