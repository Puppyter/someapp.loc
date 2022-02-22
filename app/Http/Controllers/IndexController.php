<?php

namespace App\Http\Controllers;

use App\Services\OfferService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(OfferService $offerService)
    {
        $top = $offerService->getTopViewed();
        $topByIp = $offerService->getTopViewedIp();
        return response()->view('welcome',['tops'=>$top, 'topsByIp'=>$topByIp]);
    }
}
