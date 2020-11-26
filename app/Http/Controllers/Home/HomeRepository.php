<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Question;
use App\Models\savedPost;
use Illuminate\Http\Request;

class HomeRepository extends Controller
{
    public function getAllQuestions() {
        return Question::with('user')->latest()->get();
    }

    public function getSearch($keyword) {
        return Question::with('user')->where('title', 'LIKE', '%'.$keyword.'%')->latest()->get();
    }

    public function getDetail($slug) {
        return Question::with('user')->where('slug',$slug)->get();
    }

    public function getComments($slug) {
        $data = Question::with('user')->where('slug', $slug)->get()[0];
        return Comment::where('question_id', $data['id'])->get();
    }

    public function postSaved($data) {
        savedPost::create($data);
    }

    public function createPost($input) {
        Question::create($input);
    }

    public function postComment($input) {
        Comment::create($input);
    }

    public function updatePost($input,$id) {
        $id->update([
            "title" => $input['title'],
            "question" => $input['question'],
            "slug" => \Str::slug($input['title']).'-'.\Str::random(5)
        ]);
    }

}
