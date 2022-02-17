<?php

namespace App\Http\Controllers;

use App\Services\BodyTypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BodyTypeController extends Controller
{
    public function show(Request $request)
    {
        return $request->user()->can('isAdmin',Auth::user())
            ?response()->view('createBodyType')
            :redirect()->back();
    }

    public function  create(Request $request, BodyTypeService $bodyTypeService)
    {
        $bodyTypeService->createCar($request->all());
        return response(['status'=>true]);
    }

    public function getAll(BodyTypeService $bodyTypeService)
    {
      return response(['bodyTypes'=>$bodyTypeService->getAll()]);
    }
}
