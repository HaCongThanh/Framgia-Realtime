<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\RoomType;
use App\Models\Facility;
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
    public function index()
    {
        $room_types = RoomType::all();

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

        // foreach ($room_type->images as $image) {
        //     dd($image->filename);
        // }

        

        return view('user.room_detail', [
            'room_type'    =>  $room_type
        ]);
    }

}
