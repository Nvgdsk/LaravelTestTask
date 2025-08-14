<?php

namespace Modules\LuckyGame\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Event;

class LuckyGameServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \Modules\LuckyGame\Repositories\LuckyGameRepositoryInterface::class,
            \Modules\LuckyGame\Repositories\LuckyGameRepository::class
        );
        $this->app->bind(
            \Modules\LuckyGame\Repositories\LuckyGameHistoryRepositoryInterface::class,
            \Modules\LuckyGame\Repositories\LuckyGameHistoryRepository::class
        );
    }

    public function boot()
    {
        $this->register();
        Event::listen(
            \Modules\LuckyGame\Events\LuckyGameCreated::class,
            [\Modules\LuckyGame\Listeners\LuckyGameCreatedListener::class, 'handle']
        );
        $this->loadViewsFrom(__DIR__.'/../UI/Views', 'luckyGame');
        $this->loadRoutesFrom(__DIR__.'/../Routes/index.php');
    }

}
