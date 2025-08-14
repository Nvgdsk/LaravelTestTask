<?php

namespace Modules\User\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LinkResource extends JsonResource
{
    public function toArray($request)
    {
        /**
         * @var \Modules\User\Models\UserAccessLink $resource
         */
        $resource = $this->resource;

        return [
            'access_link' => $this->getAccessLink($resource->token),
        ];
    }

    private function getAccessLink(string $token) : string
	{
		return config('app.url') . '/dashboard/' . $token;
	}
}
