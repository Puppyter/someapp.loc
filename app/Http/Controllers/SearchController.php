<?php

namespace App\Http\Controllers;

use App\Repositories\ManufactureRepository;
use App\Repositories\ModelRepository;
use App\Repositories\OfferRepository;
use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function searchOffer(Request $request, SearchService $searchService, OfferRepository $offerRepository)
    {
        return response(['offers'=>$searchService->search($request->conditions, $request->minPrice,$request->maxPrice)]);
    }

    public function searchModel(Request $request, ManufactureRepository $manufactureRepository)
    {
        return response(['models'=>$manufactureRepository->searchModels($request->id)]);
    }

    public function searchMotor(Request $request, ManufactureRepository $manufactureRepository)
    {
        return response(['motors'=>$manufactureRepository->searchMotors($request->id)]);
    }

    public function searchBodyType(Request $request, ManufactureRepository $manufactureRepository)
    {
        return response(['bodyTypes'=>$manufactureRepository->searchBodyTypes($request->id)]);
    }

    public function searchFuel(Request $request, ManufactureRepository $manufactureRepository)
    {
        return response(['fuels'=>$manufactureRepository->searchFuels($request->id)]);
    }

    public function searchManufacture(ModelRepository $modelRepository, Request $request)
    {
        return response(['manufacture'=>$modelRepository->getManufacture($request->id)]);
    }
}
