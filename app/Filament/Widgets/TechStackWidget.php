<?php

namespace App\Filament\Widgets;

use App\Models\Tech;
use Filament\Widgets\Widget;

class TechStackWidget extends Widget
{
    protected static ?int $sort = 5;

    protected int | string | array $columnSpan = 'full';

    protected static string $view = 'filament.widgets.tech-stack';

    public function getTeches()
    {
        return Tech::orderBy('name')->get();
    }
}
