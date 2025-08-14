<?php

namespace Modules\User\Factories;

use Carbon\Carbon;
use Modules\User\Models\UserAccessLink;

class AccessLinkFactory
{
    private const DEFAULT_EXPIRATION_DAYS = 1;

    public function createForUser(int $userId): UserAccessLink
    {
        $token = bin2hex(random_bytes(length: 32));
        $expiresAt = Carbon::now()->addDays(self::DEFAULT_EXPIRATION_DAYS)->toDateTimeString(); 

        return new UserAccessLink(
            [
                'user_id' => $userId,
                'token' => $token, //Token could be encrypted.
                'expired_at' => $expiresAt
            ]
           
        );
    }
}
