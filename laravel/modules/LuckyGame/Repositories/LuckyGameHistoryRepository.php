<?php

namespace Modules\LuckyGame\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\LuckyGame\Models\LuckyGameHistory;

class LuckyGameHistoryRepository implements LuckyGameHistoryRepositoryInterface
{
    public function listByDate(int $userId, int $limit = 3): Collection
    {
        return LuckyGameHistory::query()
        ->where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->limit($limit)
        ->get();
    }

    public function save(LuckyGameHistory $luckyGameHistory): LuckyGameHistory
    {
        $luckyGameHistory->save();
        return $luckyGameHistory;
    }
}
