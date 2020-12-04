<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class savedPost extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'question_id'];
    protected $with = ['question','user'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function question() {
        return $this->belongsTo(Question::class, 'question_id');
    }

}
