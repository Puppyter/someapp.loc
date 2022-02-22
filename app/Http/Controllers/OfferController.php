<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Offer;
use App\Repositories\OfferRepository;
use App\Services\CarService;
use App\Services\ManufactureService;
use App\Services\OfferService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Puppyter\Tracker\repositories\Watch;
use Puppyter\Tracker\repositories\WatchIp;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManufactureService $manufactureService)
    {
        return response()->view('cars',['manufactures'=>$manufactureService->getAll()]);
    }

    public function getAll(OfferService $offerService)
    {
        return response(['cars'=>$offerService->getAll()->items()]);
    }

    public function  compare(Request $request)
    {
        return response()->view('showCompare');
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
        $data['image']=Storage::disk('s3')->put('public/',$request->images[0]);
        $offer = $offerService->create($data);
        foreach($request->images as $image)
        {
            $path = Storage::disk('s3')->put('public/',$request->images[0]);
            $offerService->createImage(['offer_id'=>$offer->id, 'image'=>$path]);
        }
        return response(['status'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,OfferService $offerService, WatchIp $ipViewRepository, Watch $offerViewRepository)
    {
        $ipViewRepository->collect($request->id,$request->ip());
        $offerViewRepository->collect($request->id);
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
        return response()->view('offerEdit',['offer'=>$offerService->get($request->offer)]);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request,OfferService $offerRepository)
    {
//        $car->delete();
        $offerRepository->destroy($request->offer);
        return redirect()->route('offers.index');
    }
}
