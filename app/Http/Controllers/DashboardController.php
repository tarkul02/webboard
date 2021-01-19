<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Posts;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        return view('home');
    }

    public function index() 
    {
    
        $posts = Posts::paginate(20);
        // dd($posts[0]->comment()->count());
        return view('home', compact('posts'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createpost(Request $request)
    {
       
        $user_id = Auth::user()->id;

        DB::table('posts')->insert([
            [
                'users_id' => $user_id , 
                'name' => $request->post('name') , 
                'title' => $request->post('title') , 
                'detail' => $request->post('title')
            ],
        ]);
        return redirect()->route('home');
    }
}
