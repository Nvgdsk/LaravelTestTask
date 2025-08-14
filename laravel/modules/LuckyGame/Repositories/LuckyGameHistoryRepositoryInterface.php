<?php

namespace Modules\LuckyGame\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\LuckyGame\Models\LuckyGameHistory;

interface LuckyGameHistoryRepositoryInterface
{
    public function listByDate(int $userId, int $limit = 3): Collection;
    public function save(LuckyGameHistory $luckyGameHistory): LuckyGameHistory;
}