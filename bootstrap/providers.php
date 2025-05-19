<?php

use Modules\Core\Providers\CoreServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
    App\Providers\FortifyServiceProvider::class,
    App\Providers\JetstreamServiceProvider::class,
    CoreServiceProvider::class,

];
