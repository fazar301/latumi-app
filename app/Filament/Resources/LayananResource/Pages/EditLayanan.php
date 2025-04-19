<?php

namespace App\Filament\Resources\LayananResource\Pages;

use App\Filament\Resources\LayananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditLayanan extends EditRecord
{
    protected static string $resource = LayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->before(function (Actions\DeleteAction $action) {
                    $record = $this->getRecord();
                    
                    if ($record->paketLayanans()->exists()) {
                        Notification::make()
                            ->title('Tidak Dapat Menghapus Layanan')
                            ->body('Layanan ini sedang digunakan dalam paket layanan. Silakan hapus layanan ini dari paket layanan terlebih dahulu.')
                            ->danger()
                            ->send();
                        
                        $action->cancel();
                    }
                }),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
