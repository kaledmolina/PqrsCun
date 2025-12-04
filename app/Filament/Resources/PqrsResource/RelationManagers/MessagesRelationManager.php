<?php

namespace App\Filament\Resources\PqrsResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MessagesRelationManager extends RelationManager implements \Filament\Actions\Contracts\HasActions
{
    use \Filament\Actions\Concerns\InteractsWithActions;

    protected static string $relationship = 'messages';

    protected static string $view = 'filament.resources.pqrs-resource.relation-managers.messages-relation-manager';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('role')
                    ->default('admin'),
                Forms\Components\RichEditor::make('content')
                    ->label('Mensaje')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('attachments')
                    ->label('Adjuntos')
                    ->multiple()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('content')
            ->columns([
                Tables\Columns\Layout\Stack::make([
                    Tables\Columns\ViewColumn::make('content')
                        ->view('filament.tables.columns.chat-message'),
                ]),
            ])
            ->contentGrid([
                'md' => 1,
                'xl' => 1,
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
            ])
            ->defaultSort('created_at', 'asc')
            ->paginated(false) // Show all messages
            ->poll('5s');
    }

    public function replyAction(): \Filament\Actions\Action
    {
        return \Filament\Actions\Action::make('reply')
            ->label('Responder')
            ->modalHeading('Nueva Respuesta')
            ->modalWidth('lg')
            ->form([
                Forms\Components\RichEditor::make('content')
                    ->label('Mensaje')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('attachments')
                    ->label('Adjuntos')
                    ->multiple()
                    ->columnSpanFull(),
            ])
            ->action(function (array $data) {
                $this->getOwnerRecord()->messages()->create([
                    'role' => 'admin',
                    'content' => $data['content'],
                    'attachments' => $data['attachments'] ?? [],
                ]);

                // Mark PQRS as in_progress if admin replies
                $this->getOwnerRecord()->update(['status' => 'in_progress']);
                
                \Filament\Notifications\Notification::make()
                    ->title('Respuesta enviada')
                    ->success()
                    ->send();
            });
    }

    public function quickResponseAction(): \Filament\Actions\Action
    {
        return \Filament\Actions\Action::make('quickResponse')
            ->label('Respuesta Rápida')
            ->icon('heroicon-o-paper-airplane')
            ->color('primary')
            ->visible(fn () => $this->getOwnerRecord()->status === 'pending')
            ->form([
                Forms\Components\Select::make('template_type')
                    ->label('Tipo de Plantilla')
                    ->options([
                        'peticion' => 'Petición (10 días)',
                        'queja' => 'Queja (15 días)',
                        'reclamo' => 'Reclamo (15 días)',
                        'sugerencia' => 'Sugerencia (30 días)',
                        'reposicion' => 'Reposición (15 días)',
                        'apelacion' => 'Apelación (15 días)',
                    ])
                    ->default(fn () => $this->getOwnerRecord()->type)
                    ->reactive()
                    ->afterStateUpdated(function ($state, Forms\Set $set) {
                        $service = new \App\Services\PqrsResponseService();
                        $content = $service->getQuickResponseTemplate($this->getOwnerRecord(), $state);
                        $set('content', $content);
                    }),
                Forms\Components\RichEditor::make('content')
                    ->label('Contenido de la Respuesta')
                    ->required()
                    ->default(function () {
                        $service = new \App\Services\PqrsResponseService();
                        return $service->getQuickResponseTemplate($this->getOwnerRecord(), $this->getOwnerRecord()->type);
                    })
                    ->columnSpanFull(),
            ])
            ->action(function (array $data) {
                $service = new \App\Services\PqrsResponseService();
                $pqrs = $this->getOwnerRecord();
                
                // Generate PDF
                $pdfPath = $service->generatePdf($data['content'], $pqrs);
                
                // Create Message
                $pqrs->messages()->create([
                    'role' => 'admin',
                    'content' => $data['content'],
                    'attachments' => [$pdfPath],
                ]);

                // Update Status
                $pqrs->update([
                    'status' => 'in_progress',
                ]);

                \Filament\Notifications\Notification::make()
                    ->title('Respuesta rápida enviada')
                    ->success()
                    ->send();
            });
    }

    public function officialResponseAction(): \Filament\Actions\Action
    {
        return \Filament\Actions\Action::make('officialResponse')
            ->label('Respuesta Oficial')
            ->icon('heroicon-o-document-check')
            ->color('success')
            ->visible(fn () => $this->getOwnerRecord()->status === 'in_progress')
            ->form([
                Forms\Components\Select::make('template_type')
                    ->label('Tipo de Plantilla')
                    ->options([
                        'peticion' => 'Petición',
                        'queja' => 'Queja',
                        'reclamo' => 'Reclamo',
                        'sugerencia' => 'Sugerencia',
                        'reposicion' => 'Reposición',
                        'apelacion' => 'Apelación',
                    ])
                    ->default(fn () => $this->getOwnerRecord()->type)
                    ->reactive()
                    ->afterStateUpdated(function ($state, Forms\Set $set) {
                        $service = new \App\Services\PqrsResponseService();
                        $content = $service->getOfficialResponseTemplate($this->getOwnerRecord(), $state);
                        $set('content', $content);
                    }),
                Forms\Components\RichEditor::make('content')
                    ->label('Contenido de la Respuesta')
                    ->required()
                    ->default(function () {
                        $service = new \App\Services\PqrsResponseService();
                        return $service->getOfficialResponseTemplate($this->getOwnerRecord(), $this->getOwnerRecord()->type);
                    })
                    ->columnSpanFull(),
            ])
            ->action(function (array $data) {
                $service = new \App\Services\PqrsResponseService();
                $pqrs = $this->getOwnerRecord();
                
                // Generate PDF
                $pdfPath = $service->generatePdf($data['content'], $pqrs);
                
                // Create Message
                $pqrs->messages()->create([
                    'role' => 'admin',
                    'content' => $data['content'],
                    'attachments' => [$pdfPath],
                ]);

                // Update Status
                $pqrs->update([
                    'status' => 'resolved',
                    'answer' => $data['content'],
                    'answered_at' => now(),
                ]);

                \Filament\Notifications\Notification::make()
                    ->title('Respuesta oficial enviada')
                    ->success()
                    ->send();
            });
    }
}
