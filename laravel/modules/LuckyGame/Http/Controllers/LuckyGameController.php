<?php

namespace Modules\LuckyGame\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\LuckyGame\Http\Resources\LuckyGameResultResource;
use Modules\LuckyGame\Services\LuckyGameService;
use Modules\User\Facades\AccessToken;


class LuckyGameController extends Controller
{

    public function __construct(private LuckyGameService $luckyGameService)
    {
    }

	public function start(): LuckyGameResultResource
	{
		$gameResult = $this->luckyGameService->play(AccessToken::token()->user_id);
        
		return new LuckyGameResultResource($gameResult);
	}
}
