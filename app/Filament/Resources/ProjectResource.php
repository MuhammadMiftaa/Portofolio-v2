<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    protected static ?string $navigationGroup = 'Portfolio';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Basic Information')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Forms\Components\Textarea::make('description')
                        ->rows(4)
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('url')
                        ->label('Live URL')
                        ->url()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('github_link')
                        ->label('GitHub Link')
                        ->url()
                        ->maxLength(255),

                    Forms\Components\Toggle::make('show')
                        ->label('Visible on Portfolio')
                        ->default(true)
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Images')
                ->schema([
                    Forms\Components\FileUpload::make('web_view_image')
                        ->label('Web View Image')
                        ->image()
                        ->disk('public')
                        ->directory('projects/web')
                        ->imagePreviewHeight('200')
                        ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/webp'])
                        ->maxSize(2048),

                    Forms\Components\FileUpload::make('mobile_view_image')
                        ->label('Mobile View Image')
                        ->image()
                        ->disk('public')
                        ->directory('projects/mobile')
                        ->imagePreviewHeight('200')
                        ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/webp'])
                        ->maxSize(2048),
                ])
                ->columns(2),

            Forms\Components\Section::make('Tech Stack')
                ->schema([
                    Forms\Components\Repeater::make('techStacks')
                        ->relationship()
                        ->label(false)
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255),

                            Forms\Components\TextInput::make('icon')
                                ->label('Icon (class / slug)')
                                ->maxLength(255),

                            Forms\Components\ColorPicker::make('color')
                                ->label('Badge Color'),
                        ])
                        ->columns(3)
                        ->addActionLabel('Add Tech')
                        ->reorderable(false)
                        ->collapsible(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('web_view_image')
                    ->label('Preview')
                    ->disk('public')
                    ->circular(false)
                    ->height(50)
                    ->width(80),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('techStacks.name')
                    ->label('Tech Stack')
                    ->badge()
                    ->separator(',')
                    ->limitList(4),

                Tables\Columns\IconColumn::make('show')
                    ->label('Visible')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->date('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('show')
                    ->label('Visibility')
                    ->trueLabel('Visible only')
                    ->falseLabel('Hidden only'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit'   => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
