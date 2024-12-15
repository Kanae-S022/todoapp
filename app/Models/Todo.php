<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title', 'completed', 'detail', 'user_id'];

    //ユーザーとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
