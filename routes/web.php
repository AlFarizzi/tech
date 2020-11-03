<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Models\Question;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Layout.homePage');
})->middleware('guest')->name('root');

Route::group(['middleware' => 'guest'], function() {
    // Auth
    Route::get('/register', [RegisterController::class, 'getRegister'])->name('register');
    Route::get('/login', [LoginController::class, 'getLogin'])->name('login');
    Route::post('/register', [RegisterController::class, 'postRegister']);
    Route::post('/login', [LoginController::class, 'postLogin']);
    // Auth
});

Route::group(['middleware' => 'auth', 'prefix' => 'user'],function() {
    // User
        Route::get('', [UserController::class, 'index'])->name('home');
    // User

    // Question
        Route::get('myQuestions', [QuestionController::class ,'getMyQuestion'])->name('myQuestion.get');
        Route::post('myQuestions', [QuestionController::class, 'postMyQuestion'])->name('myQuestion.post');
        Route::get('public/questions/solved', [QuestionController::class, 'publicSolved'])->name('publicSolved.get'); //route for solved public question
        Route::get('myQuestions/solved', [QuestionController::class, 'mySolved'])->name('mySolved.get'); //route for my solved question
        Route::get('public/questions/unsolved', [QuestionController::class, 'publicUnsolved'])->name('publicUnsolved.get');
        Route::get('myQuestions/unsolved', [QuestionController::class, 'myUnsolved'])->name('myUnsolved.get');
        Route::post('/public/search', [QuestionController::class, 'searchQuestion'])->name('searchQuestion');
        Route::get('question/{question:slug}', [QuestionController::class, 'singlePublicQuestion'])->name('singlePublic.get');
    // Question

    // Comment
        Route::post('comment/{question:slug}', [CommentController::class, 'postComment'])->name('comment.post');
    // Comment

    Route::get('/logout', function() {
        Auth::logout();
        return redirect()->route('root');
    })->name('logout');
});
