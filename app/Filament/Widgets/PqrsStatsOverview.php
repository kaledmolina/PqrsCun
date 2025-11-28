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
        
        $overdue = Pqrs::where('deadline_at', '<', now())
            ->whereNotIn('status', ['resolved', 'closed'])
            ->count();
            
        $dueSoon = Pqrs::where('deadline_at', '>=', now())
            ->where('deadline_at', '<=', now()->addDays(3))
            ->whereNotIn('status', ['resolved', 'closed'])
            ->count();

        return [
            Stat::make('Pendientes', $pending)
                ->description('Solicitudes por atender')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
                
            Stat::make('Vencidas', $overdue)
                ->description('Atención inmediata requerida')
                ->descriptionIcon('heroicon-m-exclamation-circle')
                ->color('danger'),
                
            Stat::make('Por Vencer (3 días)', $dueSoon)
                ->description('Próximas a vencer')
                ->descriptionIcon('heroicon-m-bell-alert')
                ->color('info'),
        ];
    }
}
