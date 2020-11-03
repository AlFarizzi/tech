<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $questions = Question::with('status','user')->latest()->get();
        return view('Layout.User.dashboard',compact('questions'));
    }
}
