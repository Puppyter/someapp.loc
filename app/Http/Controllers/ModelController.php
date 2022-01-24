<?php

namespace App\Http\Controllers;

use App\Repositories\ModelRepository;
use App\Services\CarService;
use App\Services\ModelService;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function show()
    {
      return response()->view('createModel');
    }

    public function  create(Request $request, ModelService $modelService)
    {
        $modelService->createCar($request->all());
        return response(['status'=>true]);
    }

    public function getAll(ModelService $modelService)
    {
        return response(['models'=>$modelService->getAll()]);
    }


}
