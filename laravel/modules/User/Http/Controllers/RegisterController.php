<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Http\Requests\RegisterRequest;
use Modules\User\Http\Resources\LinkResource;
use Modules\User\Services\DTO\RegisterDTO;
use Modules\User\Services\RegisterManagerService;

class RegisterController extends Controller
{
   public function __construct(private RegisterManagerService $registerManagerService)
    {
    }

    public function register(RegisterRequest $request): LinkResource
    {
        $registerDTO = new RegisterDTO(
             $request->input('user_name'),
             $request->input('phone')
        );

        $accessLink = $this->registerManagerService->register($registerDTO);

        return new LinkResource($accessLink);
    }

    public function showForm()
    {
        return view('user::register');
    }
}
