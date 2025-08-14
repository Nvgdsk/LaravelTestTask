<?php

namespace Modules\LuckyGame\Services;

use Modules\LuckyGame\Factories\LuckyGameFactory;
use Modules\LuckyGame\Models\LuckyGame;
use Modules\LuckyGame\Repositories\LuckyGameRepositoryInterface;
use Modules\LuckyGame\Services\DTO\LuckyGameResultDTO;
use Modules\LuckyGame\Events\LuckyGameCreated;
use Illuminate\Support\Facades\Event;

class LuckyGameService
{
    public function __construct(
        private LuckyGameFactory $factory,
        private LuckyGameRepositoryInterface $luckyGameRepository,
        private LuckyGameResultDecoder $resultDecoder
    ) {
    }

    public function play(int $userId): LuckyGameResultDTO
    {
        $luckyGame = $this->factory->create($userId, LuckyGame::generateValue());
        $this->luckyGameRepository->save($luckyGame);
        $luckyGameDTO = $this->resultDecoder->decode($luckyGame);
        Event::dispatch(new LuckyGameCreated($luckyGameDTO));
        
        return $luckyGameDTO;

    }
}
