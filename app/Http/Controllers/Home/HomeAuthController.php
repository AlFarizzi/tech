<?php

namespace App\Http\Controllers\Home;

use App\Models\savedPost;
use Illuminate\Http\Request;
use App\Http\Requests\postRequest;
use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class HomeAuthController extends Controller
{
    public function index() {
        $repo = new HomeRepository();
        $data = $repo->getAllQuestions();
        return view('Layout.User.dashboard',compact('data'));
    }

    public function save(Request $request) {
        $data = [
            "question_id" => $request->question_id,
            "user_id" => Auth()->user()->id
        ];
        $repo = new HomeRepository();
        $data = $repo->postSaved($data);
        return redirect()->back();
    }

    public function savedPosts() {
        // dd(Auth()->user()->savedPosts[0]->question);
        $data = Auth::user()->savedPosts;
        // dd($data);
        return view('Layout.User.dashboard',compact('data'));
    }

    public function removeSavedPost(savedPost $id) {
        $id->delete();
        return redirect()->back();
    }

    public function getCreatePost() {
        return view('Layout.User.create-post');
    }

    public function postCreatePost(postRequest $request) {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['category_id'] = 2;
        $input['slug'] = \Str::slug($input['title']).'-'.\Str::random(5);
        $repo = new HomeRepository();
        $repo->createPost($input);
        return redirect()->route('auth.index');
    }

    public function myPosts() {
        $data = Auth::user()->questions;
        return view('Layout.User.dashboard',compact('data'));
    }

    public function deleteMyPosts(Question $id) {
        for ($i=0; $i < count($id->comments); $i++) {
            $id->comments[0]->delete();
        }
        $id->delete();
        return back();
    }

    public function postComment(Request $request) {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $repo = new HomeRepository();
        $repo->postComment($input);
        return redirect()->back();
    }

    public function editPost(Question $id) {
        return view('Layout.User.update-post',compact('id'));
    }

    public function updatePost(Request $request, Question $id) {
        $input = $request->all();
        $repo = new HomeRepository();
        $repo->updatePost($input,$id);
        return redirect()->route('myPosts');
    }

}
