<?php

namespace Modules\User\Services;

use Modules\User\Factories\UserFactory;
use Modules\User\Models\UserAccessLink;
use Modules\User\Services\AccessLink\AccessLinkService;
use Modules\User\Services\DTO\RegisterDTO;
use Modules\User\Repositories\UserRepositoryInterface;

class RegisterManagerService
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private UserFactory $userFactory,
        private AccessLinkService $accessLinkService
    ) {
    }

    /**
     * Register user | Registration and login in one method (not specified in SRS) for case when token expired.
     */
    public function register(RegisterDTO $registerDTO): UserAccessLink
    {
        $existingUser = $this->userRepository->findByPhone($registerDTO->getPhone());
        if ($existingUser === null) {
            $user = $this->userFactory->create(
                $registerDTO->getUserName(),
                $registerDTO->getPhone()
            );
            $this->userRepository->create($user);
        } else {
            $user = $existingUser;
        }

        return $this->accessLinkService->getOrCreateLink($user->id);
    }
}
