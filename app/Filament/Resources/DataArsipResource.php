<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataArsipResource\Pages;
use App\Filament\Resources\DataArsipResource\RelationManagers;
use App\Models\DataArsip;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataArsipResource extends Resource
{
    protected static ?string $model = DataArsip::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //Name
                Forms\Components\TextInput::make('name_file')
                    ->label('Name File')
                    ->maxLength(255) 
                    ->required(),

                // Upload File
                FileUpload::make('uploaded_file')  
                    ->label('Upload File')
                    ->disk('public')  
                    ->directory('arsip')  
                    ->required(), 

                // Status
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archived' => 'Archived',
                    ])
                    ->required(),

                // Kategori
                Forms\Components\Select::make('kategori_id')
                    ->relationship('kategori', 'name')
                    ->required(),

                // File Type
                Forms\Components\Select::make('file_type')
                    ->label('File Type')
                    ->options([
                        'pdf' => 'PDF Document',
                        'docx' => 'Word Document',
                        'jpg' => 'Image (JPG)',
                        'png' => 'Image (PNG)',
                        'zip' => 'Compressed File',
                        'xls' => 'Excel Spreadsheet',
                        'pptx' => 'PowerPoint Presentation',
                        'txt' => 'Text File',
                        'csv' => 'CSV File',
                        'mp4' => 'Video File (MP4)',
                    ])
                    ->required(),

                // Description
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->nullable()
                    ->maxLength(1000),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //Name
                Tables\Columns\TextColumn::make('name_file')
                    ->searchable(),

                // Uploaded File 
                Tables\Columns\TextColumn::make('uploaded_file')
                    ->label('Uploaded File')
                    ->searchable(),

                // Status
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(function ($state) {
                        $options = [
                            'draft' => 'Draft',
                            'published' => 'Published',
                            'archived' => 'Archived',
                        ];
                        return $options[$state] ?? 'Unknown';
                    })
                    ->sortable(),

                // Kategori
                Tables\Columns\TextColumn::make('kategori.name')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),

                // File Type
                Tables\Columns\TextColumn::make('file_type')
                    ->label('File Type')
                    ->formatStateUsing(function ($state) {
                        $options = [
                            'pdf' => 'PDF Document',
                            'docx' => 'Word Document',
                            'jpg' => 'Image (JPG)',
                            'png' => 'Image (PNG)',
                            'zip' => 'Compressed File',
                            'xls' => 'Excel Spreadsheet',
                            'pptx' => 'PowerPoint Presentation',
                            'txt' => 'Text File',
                            'csv' => 'CSV File',
                            'mp4' => 'Video File (MP4)',
                        ];
                        return $options[$state] ?? 'Unknown';
                    })
                    ->sortable(),

                // Description
                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->wrap() // Agar teks panjang tidak terpotong
                    ->searchable(),  
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
            'index' => Pages\ListDataArsips::route('/'),
            'create' => Pages\CreateDataArsip::route('/create'),
            'edit' => Pages\EditDataArsip::route('/{record}/edit'),
        ];
    }
}
