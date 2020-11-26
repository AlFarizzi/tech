<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\HomeRepository;

class HomeController extends Controller
{
    public function index() {
        $repo = new HomeRepository();
        $data = $repo->getAllQuestions();
        return view('Layout.home_page',compact('data'));
    }

    public function search(Request $request) {
        $repo = new HomeRepository();
        $data = $repo->getSearch($request->q);
        return view('Layout.home_page',compact('data'));
    }

    public function read($author, $slug) {
        $repo = new HomeRepository($slug);
        $data = $repo->getDetail($slug)[0];
        $comments = $repo->getComments($slug);
        return view('Layout.detail',compact('data','comments'));
    }

}
