<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'question'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'question_id');
    }

    public function savedPost() {
        return $this->hasOne(savedPost::class, 'question_id');
    }

    public function hashtags() {
        return $this->belongsToMany(Hashtag::class);
    }

}
