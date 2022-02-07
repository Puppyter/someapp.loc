<?php

namespace App\Services;

use App\Repositories\OfferRepository;
use App\Repositories\UserRepository;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function updateOffersToTop(int $user_id)
    {
        /** @var OfferRepository $offerRepository */
        $offerRepository = app(OfferRepository::class);
        $offerRepository->updateToTop($user_id);
    }
}
