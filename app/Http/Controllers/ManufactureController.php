<?php

namespace App\Http\Controllers;

use App\Services\ManufactureService;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    public function show()
    {
        return response()->view('createManufacture');
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
