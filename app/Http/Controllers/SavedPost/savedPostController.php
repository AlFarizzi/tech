<?php

namespace App\Http\Controllers\SavedPost;

use App\Models\savedPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Home\HomeRepository;

class savedPostController extends Controller
{
        // SavedPost Folder
        public function save(Request $request) {
            $repo = new savedPostRepository();
            $data = $repo->postSaved($request->all());
            return redirect()->back();
        }

        public function savedPosts() {
            // dd(Auth()->user()->savedPosts[0]->question);
            $data = Auth::user()->savedPosts;
            // dd($data);
            // dd($data);
            return view('Layout.User.dashboard',compact('data'));
        }

        public function removeSavedPost(savedPost $id) {
            $id->delete();
            return redirect()->back();
        }
    // SavedPost Folder
}
