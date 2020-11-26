<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthRepository extends Controller
{
    public function postRegister($request) {
        $user = User::create($request);
    }

    public function postLogin($request) {
        if (Auth::attempt(["username" => $request['username'], "password" => $request['password']])) {
            return true;
        } else {
            return false;
        }
    }
}
