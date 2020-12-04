<?php

namespace App\Http\Controllers\HashtagQuestion;

use App\Http\Controllers\Controller;
use App\Models\Hashtag;
use Illuminate\Http\Request;

class HashtagQuestionRepository extends Controller
{


    public function store($post, $hashtag) {
        for ($i=0; $i < count($hashtag); $i++) {
            $post->hashtags()->attach($hashtag[$i]);
        }
    }
}
