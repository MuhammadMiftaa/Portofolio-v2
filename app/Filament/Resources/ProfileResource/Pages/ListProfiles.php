<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use App\Filament\Resources\ProfileResource;
use App\Models\Profile;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfiles extends ListRecords
{
    protected static string $resource = ProfileResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [];

        // Only allow creating if no profile exists yet
        if (Profile::count() === 0) {
            $actions[] = Actions\CreateAction::make();
        }

        return $actions;
    }
}
