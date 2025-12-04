<?php

namespace App\Filament\Widgets;

use App\Models\Pqrs;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Carbon\Carbon;

class PqrsDeadlinesWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Monitoreo de Vencimientos';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Pqrs::query()
                    ->whereNotIn('status', ['resolved', 'closed'])
                    ->orderBy('deadline_at', 'asc')
            )
            ->columns([
                Tables\Columns\TextColumn::make('cun')
                    ->label('CUN')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipo')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'peticion' => 'info',
                        'queja' => 'danger',
                        'reclamo' => 'warning',
                        'sugerencia' => 'success',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'danger',
                        'in_progress' => 'warning',
                        'resolved' => 'success',
                        'closed' => 'gray',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('deadline_at')
                    ->label('Fecha Límite')
                    ->date()
                    ->sortable()
                    ->color(fn (Pqrs $record): string => 
                        $record->deadline_at < now() ? 'danger' : 
                        ($record->deadline_at <= now()->addDays(3) ? 'warning' : 'success')
                    ),
                Tables\Columns\TextColumn::make('days_remaining')
                    ->label('Tiempo Restante')
                    ->state(fn (Pqrs $record): string => 
                        now()->diffInDays($record->deadline_at, false) < 0 
                            ? abs(intval(now()->diffInDays($record->deadline_at, false))) . ' días vencido'
                            : intval(now()->diffInDays($record->deadline_at, false)) . ' días'
                    )
                    ->badge()
                    ->color(fn (Pqrs $record): string => 
                        $record->deadline_at < now() ? 'danger' : 
                        ($record->deadline_at <= now()->addDays(3) ? 'warning' : 'success')
                    ),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->label('Gestionar')
                    ->url(fn (Pqrs $record): string => \App\Filament\Resources\PqrsResource::getUrl('edit', ['record' => $record]))
                    ->icon('heroicon-m-pencil-square')
                    ->button(),
            ]);
    }
}
