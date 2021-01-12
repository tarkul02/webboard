<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;
class Posts extends Model
{
    use HasFactory;

    public function comment()
    {
        return $this->hasMany(Comment::class, 'post_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
