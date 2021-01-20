<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;
use App\Models\Postviews;
use App\Models\Rooms;
class Posts extends Model
{
    use HasFactory;
    protected $table = 'posts';

    public function comment()
    {
        return $this->hasMany(Comment::class, 'post_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id','id');
    }

    public function postview()
    {
        return $this->hasMany(Postviews::class, 'post_id','id');
    }

    public function rooms()
    {
        return $this->belongsTo(Rooms::class, 'rooms_id','id');
    }

}
