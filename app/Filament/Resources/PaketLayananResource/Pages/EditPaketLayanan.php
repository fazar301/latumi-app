<?php

namespace App\Filament\Resources\PaketLayananResource\Pages;

use App\Filament\Resources\PaketLayananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPaketLayanan extends EditRecord
{
    protected static string $resource = PaketLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
