<?php

namespace App\Http\Controllers;

use App\Services\BodyTypeService;
use Illuminate\Http\Request;

class BodyTypeController extends Controller
{
    public function show()
    {
        return response()->view('createBodyType');
    }

    public function  create(Request $request, BodyTypeService $bodyTypeService)
    {
        $bodyTypeService->createCar($request->all());
        return response(['status'=>true]);
    }

    public function  get(Request $request, BodyTypeService $bodyTypeService)
    {
        return response(['bodyType'=>$bodyTypeService->get($request->bodyTypeId)]);
    }

    public function getAll(BodyTypeService $bodyTypeService)
    {
      return response(['bodyTypes'=>$bodyTypeService->getAll()]);
    }
}
