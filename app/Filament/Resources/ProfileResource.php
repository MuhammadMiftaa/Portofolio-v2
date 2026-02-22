<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationGroup = 'Portfolio';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Identity')
                ->schema([
                    Forms\Components\TextInput::make('fullname')
                        ->label('Full Name')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('nickname')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('title')
                        ->label('Professional Title')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Forms\Components\Textarea::make('bio')
                        ->rows(4)
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Contact & Location')
                ->schema([
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('phone')
                        ->tel()
                        ->maxLength(50),

                    Forms\Components\TextInput::make('location')
                        ->maxLength(255),

                    Forms\Components\TextInput::make('website')
                        ->url()
                        ->maxLength(255),
                ])
                ->columns(2),

            Forms\Components\Section::make('Social Links')
                ->schema([
                    Forms\Components\TextInput::make('linkedin')
                        ->label('LinkedIn URL')
                        ->url()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('github')
                        ->label('GitHub URL')
                        ->url()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('codewars')
                        ->label('Codewars URL')
                        ->url()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('leetcode')
                        ->label('LeetCode URL')
                        ->url()
                        ->maxLength(255),
                ])
                ->columns(2),

            Forms\Components\Section::make('Languages')
                ->schema([
                    Forms\Components\TextInput::make('languages')
                        ->label('Languages (comma-separated)')
                        ->helperText('e.g. English, Indonesian')
                        ->maxLength(255)
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fullname')
                    ->label('Full Name')
                    ->searchable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->icon('heroicon-m-envelope'),

                Tables\Columns\TextColumn::make('location')
                    ->icon('heroicon-m-map-pin')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->since()
                    ->sortable(),
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
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit'   => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}
