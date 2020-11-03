<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('Layout.Auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, "password" => $request->password])) {
            return redirect()->route('home');
        } else {
            dd('Gagal Login');
        }
    }
}
