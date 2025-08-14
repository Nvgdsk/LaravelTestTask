<?php

declare(strict_types=1);

namespace Modules\LuckyGame\Events;

use Modules\LuckyGame\Services\DTO\LuckyGameResultDTO;

class LuckyGameCreated
{

    public function __construct(private LuckyGameResultDTO $luckyGameDTO)
    {
    }

    public function getLuckyGameDTO(): LuckyGameResultDTO
    {
        return $this->luckyGameDTO;
    }
}
