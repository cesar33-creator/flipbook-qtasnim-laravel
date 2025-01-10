<?php

namespace App\Filament\Resources\UploadBookResource\Pages;

use App\Filament\Resources\UploadBookResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewUploadBook extends ViewRecord
{
    protected static string $resource = UploadBookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
