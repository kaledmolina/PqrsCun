<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PqrsResource\Pages;
use App\Filament\Resources\PqrsResource\RelationManagers;
use App\Models\Pqrs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PqrsResource extends Resource
{
    protected static ?string $model = Pqrs::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Información del Cliente')
                    ->schema([
                        Forms\Components\TextInput::make('contract_number')
                            ->label('Código de Contrato')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('document_type')
                            ->label('Tipo de Documento')
                            ->disabled(fn (string $operation) => $operation === 'edit'),
                        Forms\Components\TextInput::make('document_number')
                            ->label('Número de Documento')
                            ->disabled(fn (string $operation) => $operation === 'edit'),
                        Forms\Components\TextInput::make('first_name')
                            ->label('Nombres / Razón Social')
                            ->disabled(fn (string $operation) => $operation === 'edit'),
                        Forms\Components\TextInput::make('last_name')
                            ->label('Apellidos')
                            ->disabled(fn (string $operation) => $operation === 'edit'),
                        Forms\Components\TextInput::make('email')
                            ->label('Correo Electrónico')
                            ->email()
                            ->disabled(fn (string $operation) => $operation === 'edit'),
                        Forms\Components\TextInput::make('phone')
                            ->label('Celular')
                            ->tel()
                            ->disabled(fn (string $operation) => $operation === 'edit'),
                        Forms\Components\TextInput::make('landline')
                            ->label('Teléfono Fijo')
                            ->tel()
                            ->disabled(fn (string $operation) => $operation === 'edit'),
                        Forms\Components\TextInput::make('address')
                            ->label('Dirección')
                            ->disabled(fn (string $operation) => $operation === 'edit'),
                        Forms\Components\TextInput::make('city')
                            ->label('Sede')
                            ->disabled(fn (string $operation) => $operation === 'edit'),
                    ])->columns(2),

                Forms\Components\Section::make('Detalles de la PQR')
                    ->schema([
                        Forms\Components\TextInput::make('cun')
                            ->label('CUN / Radicado')
                            ->disabled()
                            ->dehydrated(false),
                        Forms\Components\Select::make('type')
                            ->label('Tipo de Solicitud')
                            ->options([
                                'peticion' => 'Petición',
                                'queja' => 'Queja',
                                'reclamo' => 'Reclamo',
                                'sugerencia' => 'Sugerencia',
                                'reposicion' => 'Reposición',
                                'apelacion' => 'Apelación',
                            ])
                            ->disabled(fn (string $operation) => $operation === 'edit'),
                        Forms\Components\TagsInput::make('services')
                            ->label('Servicios Afectados')
                            ->disabled(fn (string $operation) => $operation === 'edit'),
                        Forms\Components\TextInput::make('motive')
                            ->label('Motivo') // Note: User said "el campo motivo alla no sale", checking if it was missing. It was in the code but maybe not filled? Or maybe they meant it wasn't shown to client? The user said "agrega campos que no le sale al cliente". Wait, "el camapo motivo alla no sale agrega campos que no le sale al cliente". This is confusing. "motive" is in the admin form. Maybe they mean "motive" is NOT in the client form so it's empty? In CreatePqrs.php, 'motive' is in rules but NOT in the blade form! So it's always null. I should probably remove it or keep it if they plan to use it internally. But the user said "el unico campo editable es de contrato". So I will keep it disabled or remove it if it's useless. Let's keep it disabled for now as per "read only".
                            ->disabled(fn (string $operation) => $operation === 'edit'),
                        Forms\Components\Textarea::make('description')
                            ->label('Descripción')
                            ->disabled(fn (string $operation) => $operation === 'edit')
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('attachments')
                            ->label('Adjuntos')
                            ->multiple()
                            ->downloadable()
                            ->disk('local')
                            ->visibility('private')
                            ->disabled(fn (string $operation) => $operation === 'edit')
                            ->columnSpanFull(),
                        Forms\Components\Select::make('status')
                            ->label('Estado')
                            ->options([
                                'pending' => 'Pendiente',
                                'in_progress' => 'En Progreso',
                                'resolved' => 'Resuelto',
                                'closed' => 'Cerrado',
                            ])
                            ->disabled(fn (string $operation) => $operation === 'edit'),
                        Forms\Components\Section::make('Satisfacción del Cliente')
                            ->schema([
                                Forms\Components\TextInput::make('rating')
                                    ->label('Calificación')
                                    ->formatStateUsing(fn ($state) => $state ? str_repeat('⭐', $state) : 'Sin calificación')
                                    ->disabled()
                                    ->dehydrated(false),
                                Forms\Components\Textarea::make('feedback')
                                    ->label('Comentarios')
                                    ->disabled()
                                    ->dehydrated(false)
                                    ->columnSpanFull(),
                            ])
                            ->visible(fn ($record) => $record && $record->rating),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cun')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'peticion' => 'info',
                        'queja' => 'warning',
                        'reclamo' => 'danger',
                        'sugerencia' => 'success',
                        'reposicion' => 'danger',
                        'apelacion' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('first_name')
                    ->label('Client')
                    ->formatStateUsing(fn ($record) => $record->first_name . ' ' . $record->last_name)
                    ->searchable(['first_name', 'last_name']),
                Tables\Columns\TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'in_progress' => 'info',
                        'resolved' => 'success',
                        'closed' => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Pendiente',
                        'in_progress' => 'En Progreso',
                        'resolved' => 'Resuelto',
                        'closed' => 'Cerrado',
                    }),
                Tables\Columns\TextColumn::make('deadline_at')
                    ->label('Fecha Límite')
                    ->date('d/m/Y')
                    ->sortable()
                    ->badge()
                    ->color(fn ($record) => 
                        $record->status === 'resolved' || $record->status === 'closed' ? 'gray' : (
                            $record->deadline_at < now() ? 'danger' : (
                                $record->deadline_at < now()->addDays(3) ? 'warning' : 'success'
                            )
                        )
                    ),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Radicado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Estado')
                    ->options([
                        'pending' => 'Pendiente',
                        'in_progress' => 'En Progreso',
                        'resolved' => 'Resuelto',
                        'closed' => 'Cerrado',
                    ]),
                Tables\Filters\Filter::make('overdue')
                    ->label('Vencidos')
                    ->query(fn (Builder $query): Builder => $query->where('deadline_at', '<', now())->whereNotIn('status', ['resolved', 'closed'])),
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'peticion' => 'Petición',
                        'queja' => 'Queja',
                        'reclamo' => 'Reclamo',
                        'sugerencia' => 'Sugerencia',
                        'reposicion' => 'Reposición',
                        'apelacion' => 'Apelación',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\MessagesRelationManager::class,
            RelationManagers\AttendantsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPqrs::route('/'),
            'create' => Pages\CreatePqrs::route('/create'),
            'edit' => Pages\EditPqrs::route('/{record}/edit'),
        ];
    }
}
