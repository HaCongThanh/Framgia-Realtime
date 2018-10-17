<?php

namespace App\Http\Controllers\Admin;

use App\Models\CustomerBookingLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomListBookController extends Controller
{
    public function index(){
        $lists = CustomerBookingLog::all();
        return view('admin.room_lists.lists', compact('lists'));
//        test
    }
}
