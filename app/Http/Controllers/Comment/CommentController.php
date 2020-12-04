<?php

namespace App\Http\Controllers\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Comment\CommentRepository;

class CommentController extends Controller
{
    public function postComment(Request $request) {
        $input = $request->all();
        $repo = new CommentRepository();
        $repo->postComment($input);
        return redirect()->back();
    }
}
