<?php

namespace Modules\LuckyGame\Factories;

use Modules\LuckyGame\Models\LuckyGame;
use Modules\User\Services\DTO\RegisterDTO;
use Modules\User\Repositories\UserRepositoryInterface;
use Modules\User\Models\User;

class LuckyGameFactory
{
    public function create(int $userId, int $generatedValue): LuckyGame
    {
        
        return new LuckyGame([
            'user_id' => $userId,
            'generated_value' => $generatedValue
        ]);
    }
}
