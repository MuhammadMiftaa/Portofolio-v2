<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExperienceResource\Pages;
use App\Models\Experience;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ExperienceResource extends Resource
{
    protected static ?string $model = Experience::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Portfolio';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Company Details')
                ->schema([
                    Forms\Components\TextInput::make('company')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('title')
                        ->label('Job Title')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('location')
                        ->maxLength(255),

                    Forms\Components\TextInput::make('website')
                        ->url()
                        ->maxLength(255),

                    Forms\Components\FileUpload::make('logo')
                        ->label('Company Logo')
                        ->image()
                        ->disk('public')
                        ->directory('experiences/logos')
                        ->imagePreviewHeight('100')
                        ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/webp', 'image/svg+xml'])
                        ->maxSize(1024)
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Duration')
                ->schema([
                    Forms\Components\DatePicker::make('start_date')
                        ->required()
                        ->native(false)
                        ->displayFormat('M d, Y'),

                    Forms\Components\DatePicker::make('end_date')
                        ->label('End Date (leave empty if current)')
                        ->native(false)
                        ->displayFormat('M d, Y'),
                ])
                ->columns(2),

            Forms\Components\Section::make('Description')
                ->schema([
                    Forms\Components\Textarea::make('description')
                        ->rows(3)
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Job Responsibilities')
                ->schema([
                    Forms\Components\Repeater::make('jobDesks')
                        ->relationship()
                        ->label(false)
                        ->schema([
                            Forms\Components\TextInput::make('title')
                                ->required()
                                ->maxLength(255),

                            Forms\Components\Textarea::make('description')
                                ->rows(2),
                        ])
                        ->addActionLabel('Add Responsibility')
                        ->reorderable(false)
                        ->collapsible(),
                ]),

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
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo')
                    ->disk('public')
                    ->circular()
                    ->size(40),

                Tables\Columns\TextColumn::make('company')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('title')
                    ->label('Job Title')
                    ->searchable(),

                Tables\Columns\TextColumn::make('start_date')
                    ->label('Start')
                    ->date('M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('end_date')
                    ->label('End')
                    ->date('M Y')
                    ->placeholder('Present')
                    ->sortable(),

                Tables\Columns\TextColumn::make('location')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('start_date', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListExperiences::route('/'),
            'create' => Pages\CreateExperience::route('/create'),
            'edit'   => Pages\EditExperience::route('/{record}/edit'),
        ];
    }
}
