<?php

namespace Modules\User\Services\AccessLink\Auth;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Request;
use Modules\User\Models\UserAccessLink;
use Modules\User\Repositories\UserAccessLinkRepositoryInterface;

class AuthAccessTokenService
{
    public function __construct(private UserAccessLinkRepositoryInterface $userAccessLinkRepository)
    {
    }
    /**
     * Better and faster its using basic bearer token authentication
     * But in SRS not clear how to implement and i understand like this
     */
    public function token(): UserAccessLink
    {
        $tokenValue = Request::header('X-Access-Token');

        if (!$tokenValue) {
            throw new AuthenticationException('Authorization failed: token missing');
        }

        $token = $this->userAccessLinkRepository->findByToken($tokenValue);

        if (!$token) {
            throw new AuthenticationException('Authorization failed: token invalid');
        }

        if ($token->expires_at && now()->greaterThan($token->expires_at)) {
            throw new AuthenticationException('Authorization failed: token expired');
        }

        return $token;
    }
   
}
