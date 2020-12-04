<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Comment\CommentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Hashtag\HashtagRepository;
use App\Http\Controllers\Question\QuestionRepository;

class HomeController extends Controller
{
    public function index() {
        $repo = new QuestionRepository();
        $data = $repo->getAllQuestions();
        $hashtag = new HashtagRepository();
        $hashtags = $hashtag->getAllHashtags();
        return view('Layout.home-page',compact('data','hashtags'));
    }

    public function search(Request $request) {
        $repo = new QuestionRepository();
        $data = $repo->getSearch($request->q);
        return view('Layout.home_page',compact('data'));
    }

    public function read($author, $slug) {
        $comment = new CommentRepository($slug);
        $question = new QuestionRepository();
        $data = $question->getDetail($slug)[0];
        $comments = $comment->getComments($slug);
        return view('Layout.detail',compact('data','comments'));
    }

}
