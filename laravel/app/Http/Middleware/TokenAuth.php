<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\User\Facades\AccessToken;
use Symfony\Component\HttpFoundation\Response;

class TokenAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        AccessToken::token();
        return $next($request);
    }
}
