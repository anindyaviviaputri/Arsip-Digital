<?php

namespace App\Filament\Resources\DataArsipResource\Pages;

use App\Filament\Resources\DataArsipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataArsips extends ListRecords
{
    protected static string $resource = DataArsipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
