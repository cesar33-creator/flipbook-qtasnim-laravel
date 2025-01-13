<?php

namespace App\Filament\Resources\UploadBookResource\Pages;

use App\Filament\Resources\UploadBookResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUploadBook extends EditRecord
{
    protected static string $resource = UploadBookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
