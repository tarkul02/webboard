<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Posts;
use App\Models\Postviews;
class ShowdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $user_id = 0;
        if (Auth::check()) {
            $user_id = Auth::user()->id;
        }
        Postviews::insert([
            [
                'users_id' => $user_id , 
                'post_id' =>  $id
            ],
        ]);

        $posts = Posts::where('id', $id)->first();

        return view('/detail', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function createcomment(Request $request)
    {
       
        $user_id = Auth::user()->id;
        $id = $request->post('postid');

        DB::table('comment')->insert([
            [
                'users_id' => $user_id , 
                'post_id' => $request->post('postid'), 
                'detail' => $request->post('comment'),
            ],
        ]);
        return redirect()->back();
    }

    public function selectupdatecomment(Request $request)
    {
        $data = $request->all();
        $posts = Comment::where('id', $data['id'])->first();
        return response()->json($posts);
    }

    public function updatecomment(Request $request)
    {
        $id = $request->post('commentid');
        $updatedetail = $request->post('updatedetail');

        DB::table('Comment')
            ->where('id', $id)
            ->update(array('detail' => $updatedetail));

        return redirect()->back();
    }

    public function deletecomment(Request $request)
    {
        $data = $request->all();
        $success = 'success';
        DB::table('Comment')->where('id', $data['id'])->delete();
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


}
