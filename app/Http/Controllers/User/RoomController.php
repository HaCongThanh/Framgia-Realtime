<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Validator;
use DB;

class RoomController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth')->only(['checkOut', 'bill']);
    }

    /**
     * [index description]
     * @return [type] [description]
     */
    public function index(Request $request)
    {
        $room_types = RoomType::paginate(6);

        if ($request->ajax()) {
            return response()->json(view('user.room_list_ajax', [
                'room_types' => $room_types
            ])->render());  
        }

        return view('user.room_list', [
            'room_types'    =>  $room_types
        ]);
    }

    /**
     * [show description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show($id)
    {
        $room_type = RoomType::find($id);

        $diff_rooms = RoomType::where('id', '!=', $id)->orderBy('id', 'desc')->limit(3)->get();

        return view('user.room_detail', [
            'room_type'     =>  $room_type,
            'diff_rooms'    =>  $diff_rooms
        ]);
    }

}
