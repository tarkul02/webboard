<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Types;
use Illuminate\Support\Facades\DB;

class TypeHomeController extends Controller
{

    public function createtype(Request $request)
    {
        DB::table('Types')->insert([
            [
                'name' => $request->post('name'), 
                'decision' => $request->post('decision') , 
                'status' => $request->post('status') 
            ],
        ]);
        return redirect()->route('admin.type');
    }

    public function edittype(Request $request)
    {
        $data = $request->all();
        $roomid = Types::where('id', $data['id'])->first();
        return response()->json($roomid);
    }

    public function updatetype(Request $request)
    {
        $id = $request->post('id');
        $name = $request->post('name');
        $decision = $request->post('decision');
        $status = $request->post('status');
        DB::table('Types')
            ->where('id', $id)
            ->update(array('name' =>  $name,'decision' =>  $decision ,'status' =>  $status));
        return redirect()->back();
    }

    public function deletetype(Request $request)
    {
        $data = $request->all();
        $success = 'success';
        DB::table('Types')->where('id', $data['id'])->delete();
        return response()->json(['success' => $success]);
    }
}
