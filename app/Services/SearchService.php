<?php

namespace App\Services;

use App\Repositories\CarRepository;
use App\Repositories\OfferRepository;

class SearchService
{

    public function searchManufacture(string $value)
    {
        /** @var CarRepository $carRepository */
        $carRepository = app(CarRepository::class);
        return $carRepository->search('manufacture', $value);
    }

    public function searchModel(string $value)
    {
        /** @var CarRepository $carRepository */
        $carRepository = app(CarRepository::class);
        return $carRepository->search('model', $value);
    }

    public function searchOffer(string $param, $value)
    {
        /** @var OfferRepository $offerRepository */
        $offerRepository = app(OfferRepository::class);
        return $offerRepository->search($param, $value);
    }
}
