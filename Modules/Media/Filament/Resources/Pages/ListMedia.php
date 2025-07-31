<?php

namespace Modules\Media\Filament\Resources\Pages;

use Modules\Media\Filament\Resources\MediaResource;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMedia extends ListRecords
{
    protected static string $resource = MediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
