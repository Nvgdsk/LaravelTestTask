<?php

namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\User\Services\AccessLink\Auth\AuthAccessTokenService;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \Modules\User\Repositories\UserAccessLinkRepositoryInterface::class,
            \Modules\User\Repositories\UserAccessLinkRepository::class
        );
        $this->app->bind(
            \Modules\User\Repositories\UserRepositoryInterface::class,
            \Modules\User\Repositories\UserRepository::class
        );
         $this->app->singleton('accessToken', function () {
            return app(AuthAccessTokenService::class);
        });
    }

    public function boot()
    {
        $this->register();
        $this->loadViewsFrom(__DIR__.'/../UI/Views', 'user');
        $this->loadRoutesFrom(__DIR__.'/../Routes/index.php');
    }

}
