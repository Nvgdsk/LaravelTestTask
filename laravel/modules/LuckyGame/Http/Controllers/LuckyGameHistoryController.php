<?php

namespace Modules\LuckyGame\Http\Controllers;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\LuckyGame\Http\Resources\LuckyGameHistoryResource;
use Modules\LuckyGame\Services\LuckyGameHistoryService;
use Modules\User\Facades\AccessToken;

class LuckyGameHistoryController extends Controller
{
    public function __construct(private LuckyGameHistoryService $historyService)
    {
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $criteria = $request->all();
        $histories = $this->historyService->get(AccessToken::token()->user_id);

        return LuckyGameHistoryResource::collection($histories);
    }
}
