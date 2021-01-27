<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Comment;
use App\Models\Rooms;
use App\Models\Types;


class AdminHomeController extends Controller
{
    public function index()
    {
        $active = 'post';
        $posts = Posts::paginate(20);
        return view('admin/home' ,compact('posts','active'));
    }

    public function comment(Request $request)
    {
        $comments = Comment::paginate(20);
        $active = 'comment';
        return view('admin.comment' ,compact('comments','active'));
    }

    public function room(Request $request)
    {
        $rooms = Rooms::paginate(20);
        $active = 'room';
        return view('admin.room' ,compact('rooms','active'));
    }

    public function type(Request $request)
    {
        $types = Types::paginate(20);
        $active = 'type';
        return view('admin.type' ,compact('types','active'));
    }
}
