<?php

namespace App\Http\Controllers\Home;

use App\Models\savedPost;
use Illuminate\Http\Request;
use App\Http\Requests\postRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Hashtag\HashtagRepository;
use App\Http\Controllers\Question\QuestionRepository;
use App\Models\Hashtag;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class HomeAuthController extends Controller
{
    public function index() {
        $repo = new QuestionRepository();
        $hashtag = new HashtagRepository();
        $data = $repo->getAllQuestions();
        $hashtags = $hashtag->getAllHashtags();
        return view('Layout.User.dashboard',compact('data','hashtags'));
    }
}
