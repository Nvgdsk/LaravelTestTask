<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\User\Facades\AccessToken;
use Modules\User\Services\AccessLink\AccessLinkService;
use Modules\User\Http\Resources\LinkResource;

class AccessLinkController extends Controller
{
    public function __construct(private AccessLinkService $accessLinkService)
    {
    }

    public function generate(): LinkResource
    {
        $accessLink = $this->accessLinkService->create(AccessToken::token()->user_id);
        
        return new LinkResource($accessLink);
    }

    public function remove()
    {
        $result = $this->accessLinkService->remove(AccessToken::token());
        return response()->json(['deleted' => $result]);
    }
}
