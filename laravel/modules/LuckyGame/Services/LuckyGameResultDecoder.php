<?php

namespace Modules\LuckyGame\Services;

use Modules\LuckyGame\Enums\ResultEnum;
use Modules\LuckyGame\Models\LuckyGame;
use Modules\LuckyGame\Services\DTO\LuckyGameResultDTO;

final class LuckyGameResultDecoder
{
    public function decode(LuckyGame $luckyGame): LuckyGameResultDTO
    {
        $value = $luckyGame->generated_value;
        $isWin = $luckyGame->generated_value % 2 === 0;
        $winAmount = $this->getWinAmount($value, $isWin);

        return new LuckyGameResultDto(
            $isWin ? ResultEnum::WIN : ResultEnum::LOSE,
            $winAmount,
            $luckyGame->user_id,
            $luckyGame->id
        );

    }

    private function getWinAmount(int $value, bool $isWin): int
    {
         if($isWin === false) {
            return 0; 
        }

        $winAmount = 0;

        $rules = [
            ['min' => 900, 'multiplier' => 0.7],
            ['min' => 600, 'multiplier' => 0.5],
            ['min' => 300, 'multiplier' => 0.3],
            ['min' => 0,   'multiplier' => 0.1],
        ];

       
        foreach ($rules as $rule) {
            if ($value > $rule['min']) {
                $winAmount = $value * $rule['multiplier'];
                break;
            }
        }

        return $winAmount * 100;// save in cents
    }

}
