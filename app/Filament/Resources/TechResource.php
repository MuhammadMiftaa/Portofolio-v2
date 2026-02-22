<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TechResource\Pages;
use App\Models\Tech;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TechResource extends Resource
{
    protected static ?string $model = Tech::class;

    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';

    protected static ?string $navigationGroup = 'Portfolio';

    protected static ?int $navigationSort = 3;

    protected static ?string $modelLabel = 'Technology';

    protected static ?string $pluralModelLabel = 'Technologies';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Technology Details')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('icon')
                        ->label('Icon (class / slug)')
                        ->helperText('e.g. devicon-react-original, heroicon-o-code, etc.')
                        ->maxLength(255),

                    Forms\Components\ColorPicker::make('color')
                        ->label('Badge Color'),
                ])
                ->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('icon')
                    ->label('Icon')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\ColorColumn::make('color')
                    ->label('Color'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->date('M d, Y')
                    ->sortable()
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
            ->defaultSort('name');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListTeches::route('/'),
            'create' => Pages\CreateTech::route('/create'),
            'edit'   => Pages\EditTech::route('/{record}/edit'),
        ];
    }
}
