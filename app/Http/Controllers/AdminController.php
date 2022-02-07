<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return response()->view('adminIndex');
    }

    public function takeUserInvoices(Request $request, UserRepository $userRepository)
    {
        $user = $userRepository->find($request->userId);
        return response(['invoices'=>$user->invoices()]);
    }
    public function takeUserInvoicesShow()
    {
       return response()->view('invoices');
    }
}
