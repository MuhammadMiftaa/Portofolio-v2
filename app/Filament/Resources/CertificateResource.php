<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificateResource\Pages;
use App\Models\Certificate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CertificateResource extends Resource
{
    protected static ?string $model = Certificate::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Portfolio';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Certificate Details')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('program')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('issuer')
                        ->maxLength(255),

                    Forms\Components\DatePicker::make('issued_at')
                        ->label('Issued At')
                        ->native(false)
                        ->displayFormat('M d, Y'),

                    Forms\Components\DatePicker::make('expires_at')
                        ->label('Expires At (leave empty if no expiry)')
                        ->native(false)
                        ->displayFormat('M d, Y'),

                    Forms\Components\Toggle::make('show')
                        ->label('Visible on Portfolio')
                        ->default(true)
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Certificate Image')
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('Certificate Image')
                        ->image()
                        ->disk('public')
                        ->directory('certificates')
                        ->imagePreviewHeight('200')
                        ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/webp'])
                        ->maxSize(2048)
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public')
                    ->height(50)
                    ->width(70),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('program')
                    ->searchable(),

                Tables\Columns\TextColumn::make('issuer')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('issued_at')
                    ->label('Issued')
                    ->date('M d, Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('expires_at')
                    ->label('Expires')
                    ->date('M d, Y')
                    ->placeholder('No Expiry')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\IconColumn::make('show')
                    ->label('Visible')
                    ->boolean(),
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
            ->defaultSort('issued_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCertificates::route('/'),
            'create' => Pages\CreateCertificate::route('/create'),
            'edit'   => Pages\EditCertificate::route('/{record}/edit'),
        ];
    }
}
