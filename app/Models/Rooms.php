<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Posts;

class Rooms extends Model
{
    use HasFactory;
    protected $table = 'rooms';

    public function posts()
    {
        return $this->hasMany(Posts::class, 'rooms_id','id');
    }
}
