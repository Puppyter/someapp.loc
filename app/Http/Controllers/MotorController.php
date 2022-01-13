<?php

namespace App\Http\Controllers;

use App\Services\CarService;
use App\Services\MotorService;
use Illuminate\Http\Request;

class MotorController extends Controller
{
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
        return response(['bodyTypes'=>$motorService->getAll()]);
    }
}
