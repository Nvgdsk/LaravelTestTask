<?php

namespace Modules\LuckyGame\Factories;

use Modules\LuckyGame\Models\LuckyGameHistory;

class LuckyGameHistoryFactory
{
    public function create(int $userId, int $luckyGameId, string $result, int $winAmount): LuckyGameHistory
    {
        return new LuckyGameHistory([
            'user_id' => $userId,
            'lucky_game_id' => $luckyGameId,
            'result' => $result,
            'win_amount' => $winAmount,
        ]);
    }
}
