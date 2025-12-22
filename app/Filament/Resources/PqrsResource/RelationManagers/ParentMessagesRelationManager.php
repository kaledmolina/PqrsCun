<?php

namespace App\Filament\Resources\PqrsResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;

class ParentMessagesRelationManager extends RelationManager
{
    protected static string $relationship = 'parentMessages';

    protected static ?string $title = 'Historial de la PQR Asociada';
    
    // Icon (Optional)
    protected static ?string $icon = 'heroicon-o-clock';

    public function isReadOnly(): bool
    {
        return true;
    }

    // Only show if parent_pqrs_id exists
    public static function canViewForRecord(Model $ownerRecord, string $pageClass): bool
    {
        return !empty($ownerRecord->parent_pqrs_id);
    }

    public function form(Form $form): Form
    {
        return $form->schema([]); 
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
            ->paginated(false); // Show all messages
    }
}
