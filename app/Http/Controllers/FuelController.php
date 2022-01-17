<?php

namespace App\Http\Controllers;

use App\Services\FuelService;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    public function show()
    {
        return response()->view('createFuel');
    }

    public function  create(Request $request, FuelService $fuelService)
    {
        $fuelService->createCar($request->all());
        return response(['status'=>true]);
    }

    public function  get(Request $request, FuelService $fuelService)
    {
        return response(['bodyType'=>$fuelService->get($request->fuelTypeId)]);
    }

    public function getAll(FuelService $fuelService)
    {
        return response(['bodyTypes'=>$fuelService->getAll()]);
    }
}
