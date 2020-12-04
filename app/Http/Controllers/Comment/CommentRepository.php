<?php

namespace App\Http\Controllers\Comment;

use App\Models\Comment;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentRepository extends Controller
{
    // Comment
        public function getComments($slug) {
            $data = Question::with('user')->where('slug', $slug)->get()[0];
            return Comment::where('question_id', $data['id'])->get();
        }
        public function postComment($input) {
            $input['user_id'] = Auth::user()->id;
            Comment::create($input);
        }
    // Comment
}
