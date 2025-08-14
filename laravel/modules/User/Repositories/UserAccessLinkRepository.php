<?php

namespace Modules\User\Repositories;

use Carbon\Carbon;
use Modules\User\Models\UserAccessLink;

class UserAccessLinkRepository implements UserAccessLinkRepositoryInterface
{
    public function create(UserAccessLink $userAccessLink): UserAccessLink
    {
        $userAccessLink->save();

        return $userAccessLink;
    }

    public function delete(UserAccessLink $userAccessLink): bool
    {
        return $userAccessLink->delete();
    }

    public function getNotExpiredLink(int $userId): ?UserAccessLink
    {
        return UserAccessLink::where('user_id', $userId)
            ->where('expired_at', '>', Carbon::now()->toDateTimeString())
            ->first();
    }

    public function findByToken(string $token): ?UserAccessLink
    {
        return UserAccessLink::where('token', $token)
            ->first();
    }

}
