<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Services\CarService;
use App\Services\ManufactureService;
use App\Services\OfferService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OfferService $offerService, ManufactureService $manufactureService)
    {
        return response()->view('cars',['cars'=>$offerService->getAll()->items(),
            'manufactures'=>$manufactureService->getAll()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ManufactureService $manufactureService)
    {
        return response()->view('createOffer',['manufactures'=>$manufactureService->getAll()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request, OfferService $offerService)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $car = $offerService->create($data);
        foreach($request->images as $image)
        {
            $path = Storage::put('public',$image);
            $offerService->createImage(['offer_id'=>$car->id, 'image'=>$path]);
        }
        return response(['status'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,OfferService $offerService)
    {
        $offer = $offerService->get($request->id);
        return response()->view('offer',['offer'=>$offer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,OfferService $offerService)
    {
        $car = $offerService->get($request->offer);
        return response()->view('offerEdit',['car'=>$car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarService $carService)
    {
        $carService->update($request->id,$request->all());
        return response(['status'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,CarService $carService)
    {
        $carService->destroy($request->carId);
        return response(['status'=>true]);
    }
}
