<?php

namespace App\Http\Controllers;

use App\Services\ManufactureService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManufactureController extends Controller
{
    public function show(Request $request)
    {
        return $request->user()->can('isAdmin',Auth::user())
            ? response()->view('createManufacture')
            : redirect()->back();
    }

    public function  create(Request $request, ManufactureService $manufactureService)
    {
        $manufactureService->create($request->all());
        return response(['status'=>true]);
    }

//    public function  get(Request $request, ManufactureService $manufactureService)
//    {
//        return response(['manufacture'=>$manufactureService->get($request->manufactureId)]);
//    }

    public function getAll(ManufactureService $manufactureService)
    {
        return response(['manufactures'=>$manufactureService->getAll()]);
    }

}
