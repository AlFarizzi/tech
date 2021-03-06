<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Hashtag\HashtagController;
use App\Http\Controllers\Home\HomeAuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Question\QuestionController;
use App\Http\Controllers\SavedPost\savedPostController;
use App\Models\Question;

Route::get('/search', [HomeController::class, 'search'])->name('guest.search');
Route::get( '/{author}/{slug}' , [HomeController::class, 'read'])->name('read');
Route::get('/popular/hashtag/{hashtag:hashtag}', [HashtagController::class, 'dependPost'])->name('dependPost');

Route::group(['middleware' => ['guest']], function() {
    Route::get('/', [HomeController::class, 'index'])->name('guest.index');
    // Auth Route
        Route::view('/login', 'Layout.Auth.login')->name('login');
        Route::post('/login', [AuthController::class, 'login']);
        Route::view('/register', 'Layout.Auth.register')->name('register');
        Route::post('/register', [AuthController::class, 'register']);
    // Auth Route
});

Route::group(['middleware' => ['auth']], function() {

    Route::group(['prefix' => 'dashboard'],function() {
        Route::get('', [HomeAuthController::class, 'index'])->name('auth.index');
        Route::post('', [savedPostController::class, 'save'])->name('save');
    });

    Route::group(['prefix' => 'saved-posts'],function() {
        Route::get('', [savedPostController::class, 'savedPosts'])->name('savedPosts');
        Route::get('remove-saved-post/{id}', [savedPostController::class, 'removeSavedPost'])->name('remove-saved-post');
    });

    Route::group(['prefix' => 'create-post'],function() {
        Route::get('', [QuestionController::class, 'getCreatePost'])->name('newPost');
        Route::post('', [QuestionController::class, 'postCreatePost']);
    });

    Route::group(['prefix' => 'my-posts'],function() {
        Route::get('',[QuestionController::class, 'myPosts'])->name('myPosts');
        Route::get('/delete-my-post/{id:slug}', [QuestionController::class, 'deleteMyPosts'])->name('deleteMyPost');
        Route::get('/update-post/{id:slug}', [QuestionController::class, 'editPost'])->name('editMyPost');
        Route::put('/update-post/{id:slug}', [QuestionController::class, 'updatePost']);
    });


    Route::post('/comment', [CommentController::class, 'postComment'])->name('postComment');

    Route::get('/logout', function() {
        Auth::logout();
        return redirect()->route('guest.index');
    })->name('logout');
});
