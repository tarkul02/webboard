<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\DB;

class PostHomeController extends Controller
{
    public function index () {

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
        DB::table('Posts')->where('id', $data['id'])->delete();
        return response()->json(['success' => $success]);
    }
}
