<?php

namespace Modules\User\Services\DTO;

class RegisterDTO
{

    public function __construct(private string $username, private string $phone)
    {
    }

    public function getUserName(): string
    {
        return $this->username;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
}
