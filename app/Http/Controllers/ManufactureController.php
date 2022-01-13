<?php

namespace App\Http\Controllers;

use App\Services\ManufactureService;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    public function  create(Request $request, ManufactureService $manufactureService)
    {
        $manufactureService->createCar($request->all());
        return response(['status'=>true]);
    }

    public function  get(Request $request, ManufactureService $manufactureService)
    {
        return response(['bodyType'=>$manufactureService->get($request->manufactureId)]);
    }

    public function getAll(ManufactureService $manufactureService)
    {
        return response(['bodyTypes'=>$manufactureService->getAll()]);
    }
}
