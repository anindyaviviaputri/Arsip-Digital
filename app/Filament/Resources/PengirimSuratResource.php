<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengirimSuratResource\Pages;
use App\Filament\Resources\PengirimSuratResource\RelationManagers;
use App\Models\PengirimSurat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengirimSuratResource extends Resource
{
    protected static ?string $model = PengirimSurat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('sender_name')
                    ->required()
                    ->label('Sender Name'),
                Forms\Components\Textarea::make('address')
                    ->required()
                    ->label('Address'),
                Forms\Components\TextInput::make('contact')
                    ->label('Contact'),
                Forms\Components\DatePicker::make('send_date')
                    ->required()
                    ->label('Send Date'),
                Forms\Components\Textarea::make('description')
                    ->label('Description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sender_name')->label('Sender Name'),
                Tables\Columns\TextColumn::make('address')->label('Address'),
                Tables\Columns\TextColumn::make('contact')->label('Contact'),
                Tables\Columns\TextColumn::make('send_date')
                    ->date('d-m-Y')
                    ->label('Send Date'),
                Tables\Columns\TextColumn::make('description')->label('Description'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengirimSurats::route('/'),
            'create' => Pages\CreatePengirimSurat::route('/create'),
            'edit' => Pages\EditPengirimSurat::route('/{record}/edit'),
        ];
    }
}
