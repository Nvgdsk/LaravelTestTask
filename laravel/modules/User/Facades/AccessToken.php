<?php
namespace Modules\User\Facades;

use Illuminate\Support\Facades\Facade;

class AccessToken extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'accessToken';
    }
}