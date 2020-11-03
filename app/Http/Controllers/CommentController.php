<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function postComment(Request $request, Question $question) {
        $request->validate([
            "comment" => ['required']
        ]);
        // dd(Auth::user()->id);
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['question_id'] = $question->id;
        Comment::create($input);
        return back();
    }
}
