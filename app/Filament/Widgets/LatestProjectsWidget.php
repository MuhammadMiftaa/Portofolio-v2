<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestProjectsWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Latest Projects';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Project::query()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('web_view_image')
                    ->label('Preview')
                    ->height(48)
                    ->width(80)
                    ->defaultImageUrl(fn () => 'https://placehold.co/80x48/111827/4DFFF6?text=No+Image')
                    ->extraImgAttributes(['class' => 'rounded-md object-cover']),

                Tables\Columns\TextColumn::make('title')
                    ->label('Project')
                    ->weight(\Filament\Support\Enums\FontWeight::Bold)
                    ->searchable(),

                Tables\Columns\TextColumn::make('techStacks.name')
                    ->label('Tech Stack')
                    ->badge()
                    ->separator(',')
                    ->color('primary')
                    ->limitList(4),

                Tables\Columns\IconColumn::make('show')
                    ->label('Visible')
                    ->boolean()
                    ->trueIcon('heroicon-o-eye')
                    ->falseIcon('heroicon-o-eye-slash')
                    ->trueColor('success')
                    ->falseColor('gray'),

                Tables\Columns\TextColumn::make('url')
                    ->label('Live URL')
                    ->url(fn ($record) => $record->url)
                    ->openUrlInNewTab()
                    ->limit(30)
                    ->color('info'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Added')
                    ->since()
                    ->color('gray'),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->label('Edit')
                    ->url(fn (Project $record) => route('filament.superadmin.resources.projects.edit', $record))
                    ->icon('heroicon-m-pencil-square')
                    ->color('gray'),
            ])
            ->paginated(false);
    }
}
