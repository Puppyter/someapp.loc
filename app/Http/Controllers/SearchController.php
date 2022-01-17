<?php

namespace App\Http\Controllers;

use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function searchOffer(Request $request, SearchService $searchService)
    {
        return response(['offers'=>$searchService->searchOffers($request->id, $request->by)]);
    }

    public function searchModel(Request $request, SearchService $searchService)
    {
        return response(['models'=>$searchService->searchModels($request->id,$request->by)]);
    }

    public function searchMotor(Request $request, SearchService $searchService)
    {
        return response(['motors'=>$searchService->searchMotors($request->id, $request->by)]);
    }

    public function searchBodyType(Request $request, SearchService $searchService)
    {
        return response(['bodyTypes'=>[$searchService->searchBodyTypes($request->id, $request->by)]]);
    }
}
