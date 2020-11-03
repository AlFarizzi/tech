<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{



    public function getMyQuestion() {
        $user = Auth::user();
        $questions = $user->questions;
        return view('Layout.User.questions',compact('questions'));
    }
    public function postMyQuestion(Request $request) {
        $request->validate([
            "title" => ['required'],
            "question" => ['required'],
        ]);
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['category_id'] = 2;
        $input['slug'] = \Str::slug($request->title);
        Question::create($input);
        return back();
    }

    public function publicSolved() {
        $questions = Question::with('status','user')->where('category_id',1)->latest()->get();
        return view('Layout.User.dashboard',compact('questions'));
    }

    public function mySolved() {
        $user = Auth::user();
        $questions = $user->questions->where('category_id',1);
        return view('Layout.User.questions',compact('questions'));
    }

    public function publicUnsolved() {
        $questions = Question::with('status','user')->where('category_id',2)->latest()->get();
        return view('Layout.User.dashboard',compact('questions'));
    }

    public function myUnsolved() {
        $user = Auth::user();
        $questions = $user->questions->where('category_id',2);
        return view('Layout.User.questions',compact('questions'));
    }

    public function searchQuestion(Request $request) {
        $keyword = $request->keyword ;
        $questions = Question::where('title', 'LIKE', '%'.$keyword.'%')->latest()->get();
        return view('Layout.User.questions',compact('questions'));
    }

    public function singlePublicQuestion(Question $question) {
        $comment = $question->comments()->latest()->get();
        return view('Layout.User.question',compact('question','comment'));
    }

}
