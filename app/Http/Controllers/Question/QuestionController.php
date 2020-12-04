<?php

namespace App\Http\Controllers\Question;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\postRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Hashtag\HashtagRepository;
use App\Http\Controllers\Question\QuestionRepository;
use App\Http\Controllers\HashtagQuestion\HashtagQuestionRepository;

class QuestionController extends Controller
{
     // Question
     public function getCreatePost() {
        return view('Layout.User.create-post');
    }

    public function postCreatePost(postRequest $request) {
        // Instant Repository
            $repo = new QuestionRepository();
            $hashtag = new HashtagRepository();
            $hashtag_question = new HashtagQuestionRepository();
        // Instant Repository

        // Store Question
            $input = $request->all();
            $post = $repo->createPost($input);
        // Store Question

        // Store Hashtags
            $hashtag = $hashtag->postHashtag($post);
        // Store Hashtags

        // Store hashtag_id question_id
            $hashtag_question->store($post,$hashtag);
        // Store hashtag_id question_id
        return redirect()->route('auth.index');
    }

    public function myPosts() {
        $data = Auth::user()->questions;
        $hashtag = new HashtagRepository();
        $hashtags = $hashtag->getAllHashtags();
        return view('Layout.User.dashboard',compact('data','hashtags'));
    }

    public function deleteMyPosts(Question $id) {
        for ($i=0; $i < count($id->comments); $i++) {
            $id->comments[0]->delete();
        }
        $id->delete();
        return back();
    }

    public function editPost(Question $id) {
        return view('Layout.User.update-post',compact('id'));
    }

    public function updatePost(Request $request, Question $id) {
        $input = $request->all();
        $repo = new QuestionRepository();
        $repo->updatePost($input,$id);
        return redirect()->route('myPosts');
    }
    // Question
}
