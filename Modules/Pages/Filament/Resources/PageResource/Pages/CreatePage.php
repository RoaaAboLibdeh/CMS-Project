<?php

namespace Modules\Pages\Filament\Resources\PageResource\Pages;

use Modules\Pages\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    protected static string $resource = PageResource::class;
}
