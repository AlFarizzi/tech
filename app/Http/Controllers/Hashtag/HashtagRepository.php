<?php

namespace App\Http\Controllers\Hashtag;

use App\Http\Controllers\Controller;
use App\Models\Hashtag;
use Illuminate\Http\Request;

class HashtagRepository extends Controller
{

    public function postHashtag($data) {
        // dd($data);
        $hashtag = explode('#',$data->question);
        $result = [];
        for ($i=1; $i < count($hashtag); $i++) {
            $exist = Hashtag::where('hashtag',$hashtag[$i])->get();
            if(count($exist) > 0) {
                $result[] = $exist[0]->id;
            } else {
                $newHashtag = Hashtag::create([
                    "hashtag" => $hashtag[$i]
                ]);
                $result[] = $newHashtag->id;
            }
        }
        return $result;
    }

      public function getAllHashtags() {
            return Hashtag::with('questions')->has('questions')->get();
        }
}
