<?php

namespace Modules\User\Repositories;

use Modules\User\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function findByPhone(string $phone): ?User
    {
        return User::where( 'phone', $phone)->first();
    }
    public function create(User $user): User
    {
        $user->save();
        
        return $user;
    }
}
