<?php

namespace App\Http\Controllers;

use App\Services\CarService;
use App\Services\ModelService;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function  create(Request $request, ModelService $modelService)
    {
        $modelService->createCar($request->all());
        return response(['status'=>true]);
    }

    public function  get(Request $request, ModelService $modelService)
    {
        return response(['bodyType'=>$modelService->get($request->modelId)]);
    }

    public function getAll(ModelService $modelService)
    {
        return response(['bodyTypes'=>$modelService->getAll()]);
    }
}
