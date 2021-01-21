<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Posts;
use App\Models\Rooms;
use App\Models\Types;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index() 
    {
    
        $posts = Posts::paginate(20);
        $rooms = Rooms::All();
        $types = Types::All();
        // dd($posts[0]->postview()->count());
        return view('home', compact('posts','rooms','types'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createpost(Request $request)
    {
        $room = $request->post('selectroom');
        $room_id = substr($room ,0,1);

        $type = $request->post('selecttype');
        $type_name = substr($type ,0,1);

        $user_id = Auth::user()->id;

        DB::table('posts')->insert([
            [
                'users_id' => $user_id , 
                'rooms_id' => $room_id , 
                'type_name' => $type_name , 
                'name' => $request->post('name') , 
                'title' => $request->post('title') , 
                'detail' => $request->post('title')
            ],
        ]);
        return redirect()->route('dashboard' ,['id' => $room_id ]);
    }

    public function editpost(Request $request)
    {
        $data = $request->all();
        $posts = Posts::where('id', $data['id'])->first();
        return response()->json($posts);
    }

    public function updatepost(Request $request)
    {
        $idpost = $request->post('idpost');
        $namepost = $request->post('namepost');
        $titlepost = $request->post('titlepost');
        $detailpost = $request->post('detailpost');
        DB::table('posts')
            ->where('id', $idpost)
            ->update(array('name' => $namepost , 'title' => $titlepost , 'detail' =>  $detailpost));
        return redirect()->back();
    }

    public function deletepost(Request $request)
    {
        $data = $request->all();
        $success = 'success';
        DB::table('Comment')->where('id', $data['id'])->delete();
        return response()->json(['success' => $success]);
    }
}
