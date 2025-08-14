<?php

declare(strict_types=1);

namespace Modules\LuckyGame\Services\DTO;

use Modules\LuckyGame\Enums\ResultEnum;

class LuckyGameResultDTO
{

    public function __construct(
        private ResultEnum $result, 
        private int $winAmount,
        private int $userId, 
        private int $luckyGameId)
    {
    }

    public function getResult(): string
    {
        return $this->result->value;
    }

    public function getWinAmount(): int
    {
        return $this->winAmount;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getLuckyGameId(): int
    {
        return $this->luckyGameId;
    }
}
