<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CommentHomeController extends Controller
{
    public function editcomment(Request $request)
    {
        $data = $request->all();
        $posts = Comment::where('id', $data['id'])->first();
        return response()->json($posts);
    }

    public function updatecomment(Request $request)
    {
        $idcomment = $request->post('idcomment');
        $detailcomment = $request->post('detailcomment');
        DB::table('Comment')
            ->where('id', $idcomment)
            ->update(array('detail' =>  $detailcomment));
        return redirect()->back();
    }

    public function deletecomment(Request $request)
    {
        $data = $request->all();
        $success = 'success';
        DB::table('Comment')->where('id', $data['id'])->delete();
        return response()->json(['success' => $success]);
    }
}
