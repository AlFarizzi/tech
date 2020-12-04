<?php

namespace App\Http\Controllers\Question;

use App\Models\Comment;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hashtag;
use Illuminate\Support\Facades\Auth;

class QuestionRepository extends Controller
{
    // QuestionRepo
        public function getAllQuestions() {
            return Question::with('user','savedPost')->latest()->get();
        }

        public function getSearch($keyword) {
            return Question::with('user')->where('title', 'LIKE', '%'.$keyword.'%')->latest()->get();
        }

        public function getDetail($slug) {
            return Question::with('user')->where('slug',$slug)->get();
        }

        public function createPost($input) {
            $input['user_id'] = Auth::user()->id;
            $input['category_id'] = 2;
            $input['slug'] = \Str::slug($input['title']).'-'.\Str::random(5);
            $post = Question::create($input);
            return $post;
        }

        public function updatePost($input,$id) {
            $id->update([
                "title" => $input['title'],
                "question" => $input['question'],
                "slug" => \Str::slug($input['title']).'-'.\Str::random(5)
            ]);
        }


    // Question
}
