<?php

namespace App\Filament\Resources\PqrsResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MessagesRelationManager extends RelationManager
{
    protected static string $relationship = 'messages';

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
                Tables\Filters\SelectFilter::make('sort')
                    ->label('Orden')
                    ->options([
                        'asc' => 'Más antiguos primero',
                        'desc' => 'Más recientes primero',
                    ])
                    ->default('asc')
                    ->query(function (Builder $query, array $data) {
                        return $query->orderBy('created_at', $data['value'] ?? 'asc');
                    }),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Responder')
                    ->modalHeading('Nueva Respuesta')
                    ->modalWidth('lg')
                    ->after(function ($livewire) {
                        // Mark PQRS as in_progress if admin replies
                        $livewire->getOwnerRecord()->update(['status' => 'in_progress']);
                    }),
                Tables\Actions\Action::make('officialResponse')
                    ->label('Respuesta Oficial')
                    ->icon('heroicon-o-document-check')
                    ->color('success')
                    ->form([
                        Forms\Components\Select::make('template_type')
                            ->label('Tipo de Plantilla')
                            ->options([
                                'peticion' => 'Petición (10-15 días)',
                                'queja' => 'Queja (15 días)',
                                'reclamo' => 'Reclamo (15 días)',
                                'sugerencia' => 'Sugerencia (30 días)',
                                'reposicion' => 'Reposición (15 días)',
                                'apelacion' => 'Apelación (15 días)',
                            ])
                            ->default(fn ($livewire) => $livewire->getOwnerRecord()->type)
                            ->reactive()
                            ->afterStateUpdated(function ($state, Forms\Set $set, $livewire) {
                                $service = new \App\Services\PqrsResponseService();
                                $content = $service->getTemplate($livewire->getOwnerRecord(), $state);
                                $set('content', $content);
                            }),
                        Forms\Components\RichEditor::make('content')
                            ->label('Contenido de la Respuesta')
                            ->required()
                            ->default(function ($livewire) {
                                $service = new \App\Services\PqrsResponseService();
                                return $service->getTemplate($livewire->getOwnerRecord(), $livewire->getOwnerRecord()->type);
                            })
                            ->columnSpanFull(),
                    ])
                    ->action(function (array $data, $livewire) {
                        $service = new \App\Services\PqrsResponseService();
                        $pqrs = $livewire->getOwnerRecord();
                        
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
                    }),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ])
            ->defaultSort('created_at', 'asc')
            ->paginated(false); // Show all messages
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return parent::render()->with([
            'header' => view('filament.resources.pqrs-resource.relation-managers.messages-header'),
        ]);
    }
}
