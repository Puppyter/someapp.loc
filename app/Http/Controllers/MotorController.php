<?php

namespace App\Http\Controllers;

use App\Services\BodyTypeService;
use App\Services\FuelService;
use App\Services\MotorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MotorController extends Controller
{
    public function show(Request $request)
    {
        return $request->user()->can('isAdmin',Auth::user())
            ? response()->view('createMotor')
            : redirect()->back();
    }

    public function  create(Request $request, MotorService $motorService)
    {
        $motorService->createCar($request->all());
        return response(['status'=>true]);
    }

    public function  get(Request $request, MotorService $motorService)
    {
        return response(['bodyType'=>$motorService->get($request->motorId)]);
    }

    public function getAll(MotorService $motorService)
    {
        return response(['motors'=>$motorService->getAll()]);
    }
}
