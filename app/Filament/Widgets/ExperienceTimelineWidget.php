<?php

namespace App\Filament\Widgets;

use App\Models\Experience;
use Filament\Widgets\Widget;

class ExperienceTimelineWidget extends Widget
{
    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 1;

    protected static string $view = 'filament.widgets.experience-timeline';

    public function getExperiences()
    {
        return Experience::with('techStacks')
            ->orderByDesc('start_date')
            ->get();
    }
}
