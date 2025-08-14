<?php

namespace Modules\User\Services\AccessLink;

use Modules\User\Factories\AccessLinkFactory;
use Modules\User\Models\UserAccessLink;
use Modules\User\Repositories\UserAccessLinkRepositoryInterface;

class AccessLinkService
{

    public function __construct(
        private UserAccessLinkRepositoryInterface $accessLinkRepository,
        private AccessLinkFactory $accessLinkFactory
    )
    {
    }

    public function getOrCreateLink(int $userId): UserAccessLink
    {
        $userAccessLink = $this->accessLinkRepository->getNotExpiredLink($userId);

        if ($userAccessLink !== null) {
            return $userAccessLink;
        }

        return $this->create($userId);
    }

    public function create(int $userId): UserAccessLink
    {
        $userAccessLink = $this->accessLinkFactory->createForUser($userId);
        $this->accessLinkRepository->create($userAccessLink);

        return $userAccessLink;
    }

    public function remove(UserAccessLink $userAccessLink): bool
    {
       return $this->accessLinkRepository->delete($userAccessLink);
    }
}
