<?php

namespace Modules\User\Repositories;

use Modules\User\Models\User;

interface UserRepositoryInterface
{
    public function create(User $user): User;

    public function findByPhone(string $phone): ?User;
}
