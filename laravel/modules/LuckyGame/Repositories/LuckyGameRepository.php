<?php

namespace Modules\LuckyGame\Repositories;

use Modules\LuckyGame\Models\LuckyGame;

class LuckyGameRepository implements LuckyGameRepositoryInterface
{
    public function save(LuckyGame $luckyGame): LuckyGame
    {
        $luckyGame->save();

        return $luckyGame;
    }
}
