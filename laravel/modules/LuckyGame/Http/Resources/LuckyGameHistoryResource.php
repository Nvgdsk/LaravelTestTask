<?php

namespace Modules\LuckyGame\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LuckyGameHistoryResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'result' => $this->result,
            'win_amount' => $this->win_amount,
            'created_at' => $this->created_at,
        ];
    }
}
