<?php

declare(strict_types=1);

namespace Modules\LuckyGame\Listeners;

use Modules\LuckyGame\Events\LuckyGameCreated;
use Modules\LuckyGame\Services\LuckyGameHistoryService;

class LuckyGameCreatedListener
{
    public function __construct(private LuckyGameHistoryService $historyService)
    {
    }

    public function handle(LuckyGameCreated $event): void
    {
        $resultDTO = $event->getLuckyGameDTO();

        try {
             $this->historyService->save(
            $resultDTO
        );  
        } catch (\Exception $e) {
            report($e);
            return;
        }
      
    }
}
