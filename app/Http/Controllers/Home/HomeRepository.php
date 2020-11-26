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
        return Question::with('user','savedPost')->latest()->get();
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
        $check = savedPost::where('user_id',$data['user_id'])->where('question_id',$data['question_id'])->get();
        if($check->count() > 0) {
            session()->flash('error', 'postingan ini sudah pernah disimpan');
        } else {
            savedPost::create($data);
        }
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
