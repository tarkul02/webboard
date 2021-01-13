<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Posts;
use App\Models\User;

class Postviews extends Model
{
    use HasFactory;
    protected $table = 'postviews';

    public function posts()
    {
        return $this->belongsTo(Posts::class, 'post_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id','id');
    }
}
