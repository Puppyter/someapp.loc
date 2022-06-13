<?php

namespace App\Http\Controllers;

use App\Services\OfferService;
use Illuminate\Http\Request;
use Puppyter\Tracker\Facades\Track;

class IndexController extends Controller
{
    public function index()
    {
//        $tops = Track::get(false);
//        $topsIp = Track::get(true);
        return response()->view('welcome');
    }
}
