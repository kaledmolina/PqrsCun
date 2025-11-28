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
                Tables\Columns\TextColumn::make('role')
                    ->label('Rol')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'admin' => 'success',
                        'client' => 'info',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'admin' => 'Administrador',
                        'client' => 'Cliente',
                    }),
                Tables\Columns\TextColumn::make('content')
                    ->label('Mensaje')
                    ->html()
                    ->wrap(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Responder')
                    ->modalHeading('Nueva Respuesta')
                    ->modalWidth('lg')
                    ->after(function ($livewire) {
                        // Mark PQRS as resolved/answered if admin replies?
                        // $livewire->ownerRecord->update(['status' => 'in_progress']);
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
            ->defaultSort('created_at', 'asc'); // Show oldest first (chronological)
    }
}
