<?php

namespace App\Filament\Resources\SesiResource\Pages;

use App\Filament\Resources\SesiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSesi extends CreateRecord
{
    protected static string $resource = SesiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
