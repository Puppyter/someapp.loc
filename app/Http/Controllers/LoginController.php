<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt($request->all(), true)) {
            $request->session()->regenerate();
            return response(['status'=>true]);
        }
        return back()->withErrors(['email' => 'Account with this email not found']);
    }
    public function logout(){
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('users.index');
    }
}
