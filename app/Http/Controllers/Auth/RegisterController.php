<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function getRegister() {
        return view('Layout.Auth.register');
    }

    public function postRegister (RegisterRequest $request) {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        User::create($input);
        return back();
    }
}
