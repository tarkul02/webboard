<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rooms;
use Illuminate\Support\Facades\DB;

class RoomHomeController extends Controller
{
    public function createroom(Request $request)
    {
        DB::table('Rooms')->insert([
            [
                'name' => $request->post('name'), 
                'decision' => $request->post('decision') , 
                'status' => $request->post('status')    
            ],
        ]);
        return redirect()->route('admin.room');
    }

    public function editroom(Request $request)
    {
        $data = $request->all();
        $roomid = Rooms::where('id', $data['id'])->first();
        return response()->json($roomid);
    }

    public function updateroom(Request $request)
    {
        $id = $request->post('id');
        $name = $request->post('name');
        $decision = $request->post('decision');
        $status = $request->post('status');
        DB::table('Rooms')
            ->where('id', $id)
            ->update(array('name' =>  $name,'decision' =>  $decision ,'status' =>  $status));
        return redirect()->back();
    }

    public function deleteroom(Request $request)
    {
        $data = $request->all();
        $success = 'success';
        DB::table('Rooms')->where('id', $data['id'])->delete();
        return response()->json(['success' => $success]);
    }
}
