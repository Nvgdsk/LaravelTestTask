<?php

namespace Database\Factories\Modules\User\Models;

use Modules\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'user_name' => $this->faker->userName,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
