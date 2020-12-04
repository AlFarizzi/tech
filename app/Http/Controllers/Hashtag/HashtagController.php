<?php

namespace App\Http\Controllers\Hashtag;

use App\Models\Hashtag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Hashtag\HashtagRepository;

class HashtagController extends Controller
{
    public function dependPost(Hashtag $hashtag) {
        $repo = new HashtagRepository();
        $data = $hashtag->questions;
        $hashtags = $repo->getAllHashtags();
        return view('Layout.User.dashboard',compact('data','hashtags'));
    }
}
