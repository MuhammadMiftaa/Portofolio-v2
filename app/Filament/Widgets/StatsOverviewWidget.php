<?php

namespace App\Filament\Widgets;

use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Tech;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalProjects    = Project::count();
        $activeProjects   = Project::where('show', true)->count();
        $totalExperiences = Experience::count();
        $totalCerts       = Certificate::count();
        $activeCerts      = Certificate::where('show', true)->count();
        $totalTeches      = Tech::count();

        return [
            Stat::make('Total Projects', $totalProjects)
                ->description("{$activeProjects} currently shown")
                ->descriptionIcon('heroicon-m-eye')
                ->color('success')
                ->icon('heroicon-o-folder-open'),

            Stat::make('Work Experiences', $totalExperiences)
                ->description('Recorded experiences')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('warning')
                ->icon('heroicon-o-briefcase'),

            Stat::make('Certificates', $totalCerts)
                ->description("{$activeCerts} active")
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('info')
                ->icon('heroicon-o-academic-cap'),

            Stat::make('Tech Stack', $totalTeches)
                ->description('Technologies listed')
                ->descriptionIcon('heroicon-m-cpu-chip')
                ->color('primary')
                ->icon('heroicon-o-cpu-chip'),
        ];
    }
}
