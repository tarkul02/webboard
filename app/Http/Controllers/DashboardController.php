<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Rooms;
use App\Models\Posts;
use Illuminate\Cache\RateLimiting\Limit;

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
    
        $rooms = Rooms::All();
        $generals = Posts::where('rooms_id', 1)->take(2)->orderBy('id', 'DESC')->get();
        $dtwallets = Posts::where('rooms_id', 2)->take(2)->orderBy('id', 'DESC')->get();
        $mbwallets = Posts::where('rooms_id', 3)->take(2)->orderBy('id', 'DESC')->get();
        $webwallets = Posts::where('rooms_id', 4)->take(2)->orderBy('id', 'DESC')->get();
        $smartcontracts = Posts::where('rooms_id', 5)->take(2)->orderBy('id', 'DESC')->get();
        $dapps = Posts::where('rooms_id', 6)->take(2)->orderBy('id', 'DESC')->get();
        $oracles = Posts::where('rooms_id', 7)->take(2)->orderBy('id', 'DESC')->get();
        $defis = Posts::where('rooms_id', 8)->take(2)->orderBy('id', 'DESC')->get();
        // dd($posts[0]->comment()->count());
        return view('main', compact('rooms','generals','dtwallets','mbwallets','webwallets','webwallets','smartcontracts','dapps','oracles','defis'));
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
