<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request) {
        $repo = new AuthRepository();
        $data = $repo->postRegister($request->all());
        return redirect()->route('login');
    }

    public function login(Request $request) {
        $repo = new AuthRepository();
        $data = $repo->postLogin($request->all());
        if($data) {
            return redirect()->route('auth.index');
        } else {
            return redirect()->route('login');
        }
    }

}
