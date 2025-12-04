<?php

namespace App\Filament\Widgets;

use App\Models\Pqrs;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PqrsStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $pending = Pqrs::where('status', 'pending')->count();
        $inProgress = Pqrs::where('status', 'in_progress')->count();
        $resolved = Pqrs::where('status', 'resolved')->count();

        return [
            Stat::make('Sin Atender', $pending)
                ->description('Enviar mensaje rápido')
                ->descriptionIcon('heroicon-m-clock')
                ->color('danger'),
                
            Stat::make('En Proceso', $inProgress)
                ->description('Enviar respuesta final')
                ->descriptionIcon('heroicon-m-arrow-path')
                ->color('warning'),
                
            Stat::make('Pendiente por Cerrar', $resolved)
                ->description('Cerrar y archivar con evidencias')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
        ];
    }
}
