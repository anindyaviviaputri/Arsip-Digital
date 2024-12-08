<?php

namespace App\Filament\Resources\PengirimSuratResource\Pages;

use App\Filament\Resources\PengirimSuratResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengirimSurats extends ListRecords
{
    protected static string $resource = PengirimSuratResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
