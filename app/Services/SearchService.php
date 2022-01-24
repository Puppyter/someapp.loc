<?php

namespace App\Services;

use App\Repositories\BodyTypeRepository;
use App\Repositories\FuelRepository;
use App\Repositories\ManufactureRepository;
use App\Repositories\ModelRepository;
use App\Repositories\OfferRepository;
use Illuminate\Support\Facades\Storage;

class SearchService
{
    public function search(?array $conditions, ?array $prices)
    {
        /** @var OfferRepository $offerRepository */
        $offerRepository = app(OfferRepository::class);
        $offers = $offerRepository->search($conditions, $prices);
        foreach ($offers as $offer) {
            $offer->model_id = $offer->model;
            $offer->manufacture_id = $offer->manufacture;
            $offer->image = Storage::url($offer->images->first()['image']);
        }
        return $offers;

    }
}
