<?php

namespace Modules\LuckyGame\Services;

use Modules\LuckyGame\Factories\LuckyGameHistoryFactory;
use Modules\LuckyGame\Models\LuckyGameHistory;
use Modules\LuckyGame\Repositories\LuckyGameHistoryRepositoryInterface;
use Modules\LuckyGame\Services\DTO\LuckyGameResultDTO;
use Illuminate\Support\Collection;
class LuckyGameHistoryService
{
    public function __construct(
        private LuckyGameHistoryFactory $factory,
        private LuckyGameHistoryRepositoryInterface $historyRepository
    ) {
    }

    public function save(LuckyGameResultDTO $resultDTO): LuckyGameHistory
    {
        $history = $this->factory->create(
            $resultDTO->getUserId(),
            $resultDTO->getLuckyGameId(),
            $resultDTO->getResult(),
            $resultDTO->getWinAmount()
        );
        $this->historyRepository->save($history);

        return $history;
    }

    public function get(int $userId): Collection
    {
        return $this->historyRepository->listByDate($userId);
    }
}
