<?php

namespace App\Http\Controllers;

use App\Services\FuelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FuelController extends Controller
{
    public function show(Request $request)
    {
        return $request->user()->can('isAdmin',Auth::user())
            ? response()->view('createFuel')
            : redirect()->back();
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
        return response(['fuels'=>$fuelService->getAll()]);
    }
}
