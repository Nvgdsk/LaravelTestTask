<?php

namespace Modules\LuckyGame\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LuckyGameResultResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'result' => $this->getResult(),
            'win_amount' => $this->getWinAmount(),
        ];
    }
}
