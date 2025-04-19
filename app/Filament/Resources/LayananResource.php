<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Layanan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LayananResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Pelmered\FilamentMoneyField\Tables\Columns\MoneyColumn;
use App\Filament\Resources\LayananResource\RelationManagers;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Pelmered\FilamentMoneyField\Forms\Components\MoneyInput;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Collection;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;

class LayananResource extends Resource
{
    protected static ?string $model = Layanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?string $navigationGroup = 'Manage Layanan';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_layanan')->required(),
                MoneyInput::make('harga_layanan')->decimals(0)->numeric()->required(),
                Select::make('kategori_id')
                    ->relationship('kategori', 'nama_kategori')
                    ->required()
                    ->label('Kategori'),
                Textarea::make('deskripsi')->required(),
                FileUpload::make('image')
                    ->image()
                    ->maxSize(10000)
                    ->required()
                    ->visibility('public')
                    ->disk('public')
                    ->directory('layanan-images')
            ]);
    } 

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_layanan')->searchable(),
                MoneyColumn::make('harga_layanan')->decimals(0),
                TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori'),
                TextColumn::make('deskripsi')->limit(50),
                ImageColumn::make('image')
                    ->disk('public')
                    ->square()
                    ->height(50)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function (Tables\Actions\DeleteAction $action, Layanan $record) {
                        // Check if layanan is used in paket layanan
                        if ($record->paketLayanans()->exists()) {
                            Notification::make()
                                ->title('Tidak Dapat Menghapus Layanan')
                                ->body('Layanan ini sedang digunakan oleh satu atau lebih paket layanan. Silakan hapus layanan ini dari paket layanan tersebut terlebih dahulu.')
                                ->danger()
                                ->send();
                            $action->cancel();
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function (Tables\Actions\DeleteBulkAction $action, Collection $records) {
                            $usedLayanans = collect();
                            
                            foreach ($records as $record) {
                                if ($record->paketLayanans()->exists()) {
                                    $usedLayanans->push($record->nama_layanan);
                                }
                            }

                            if ($usedLayanans->isNotEmpty()) {
                                Notification::make()
                                    ->title('Tidak Dapat Menghapus Layanan')
                                    ->body('Layanan berikut sedang digunakan dalam paket layanan: ' . $usedLayanans->join(', ') . '. Silakan hapus layanan tersebut dari paket layanan terlebih dahulu.')
                                    ->danger()
                                    ->send();
                                $action->cancel();
                            }
                        }),
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
            'index' => Pages\ListLayanans::route('/'),
            'create' => Pages\CreateLayanan::route('/create'),
            'edit' => Pages\EditLayanan::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withCount(['paketLayanans'])
            ->orderBy('created_at', 'desc');
    }

    protected function handleRecordDeletion(Model $record): void
    {
        if ($record->paketLayanans()->exists()) {
            Notification::make()
                ->title('Tidak Dapat Menghapus Layanan')
                ->body('Layanan ini sedang digunakan dalam paket layanan. Silakan hapus layanan ini dari paket layanan terlebih dahulu.')
                ->danger()
                ->send();
            
            $this->halt();
        }

        parent::handleRecordDeletion($record);
    }
}
