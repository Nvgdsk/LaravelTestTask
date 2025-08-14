<?php

namespace Modules\LuckyGame\Repositories;

use Modules\LuckyGame\Models\LuckyGame;

interface LuckyGameRepositoryInterface
{
    public function save(LuckyGame $luckyGame): LuckyGame;
}
