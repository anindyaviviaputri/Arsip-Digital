<?php

namespace App\Filament\Resources\DataArsipResource\Pages;

use App\Filament\Resources\DataArsipResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataArsip extends EditRecord
{
    protected static string $resource = DataArsipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
