<?php

namespace App\Http\Controllers\SavedPost;

use App\Models\savedPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class savedPostRepository extends Controller
{
       // SavedPost
       public function postSaved($data) {
        //    dd($data);
        $check = savedPost::where('user_id',$data['user_id'])->where('question_id',$data['question_id'])->get();
        if($check->count() > 0) {
            session()->flash('error', 'postingan ini sudah pernah disimpan');
        } else {
            savedPost::create([
                "user_id" => Auth::user()->id,
                "question_id" =>$data['question_id']
            ]);
        }
    }
// SavedPost
}
