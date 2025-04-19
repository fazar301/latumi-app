<?php

namespace App\Filament\Resources\PaketLayananResource\Pages;

use App\Filament\Resources\PaketLayananResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePaketLayanan extends CreateRecord
{
    protected static string $resource = PaketLayananResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
