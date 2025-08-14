<?php

namespace Modules\User\Repositories;

use Modules\User\Models\UserAccessLink;

interface UserAccessLinkRepositoryInterface
{
    public function create(UserAccessLink $userAccessLink): UserAccessLink;
    public function delete(UserAccessLink $userAccessLink): bool;
    public function getNotExpiredLink(int $userId): ?UserAccessLink;
    public function findByToken(string $token): ?UserAccessLink;

}
