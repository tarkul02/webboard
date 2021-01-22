<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Rooms;
use App\Models\Posts;
use App\Models\Types;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Http;

class HomeDashboardController extends Controller
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

    public function index($id)
    {

        $user_id = 0;
        if (Auth::check()) {
            $user_id = Auth::user()->id;
        }
        $roomtitle = Rooms::where('id', $id)->get();
        $types = Types::All();
        $rooms = Rooms::All();
        $posts = Posts::where('rooms_id', $id)->paginate(2);
        return view('/home', compact('posts','rooms','types','roomtitle'));
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
