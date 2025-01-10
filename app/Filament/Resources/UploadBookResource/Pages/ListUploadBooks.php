<?php

namespace App\Filament\Resources\UploadBookResource\Pages;

use App\Filament\Resources\UploadBookResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUploadBooks extends ListRecords
{
    protected static string $resource = UploadBookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
