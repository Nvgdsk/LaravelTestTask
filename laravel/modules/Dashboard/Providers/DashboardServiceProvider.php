<?php

namespace Modules\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class DashboardServiceProvider extends ServiceProvider
{
    public function register()
    {
       
    }

    public function boot()
    {
        $this->register();
        $this->loadViewsFrom(__DIR__.'/../UI/Views', 'dashboard');
        $this->loadRoutesFrom(__DIR__.'/../Routes/index.php');
    }

}
