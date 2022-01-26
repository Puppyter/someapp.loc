<?php

namespace App\Http\Controllers;

use App\Repositories\ModelRepository;
use App\Services\CarService;
use App\Services\ModelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModelController extends Controller
{
    public function show(Request $request)
    {
        return $request->user()->can('isAdmin',Auth::user())
            ? response()->view('createModel')
            : redirect()->back();
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
