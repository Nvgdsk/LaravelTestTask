<?php

use Modules\LuckyGame\Providers\LuckyGameServiceProvider;
use Modules\User\Providers\UserServiceProvider;
use Modules\Dashboard\Providers\DashboardServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    UserServiceProvider::class,
    LuckyGameServiceProvider::class,
    DashboardServiceProvider::class
];
