<?php

namespace Modules\User\Factories;

use Modules\User\Services\DTO\RegisterDTO;
use Modules\User\Repositories\UserRepositoryInterface;
use Modules\User\Models\User;

class UserFactory
{
    public function create(string $userName, string $phone): User
    {
        $trimmedUserName = trim($userName);
        $digitsOnlyPhone = preg_replace('/\D/', '', $phone);

        return new User([
            'username' => $trimmedUserName,
            'phone' => $digitsOnlyPhone,
        ]);
    }
}
