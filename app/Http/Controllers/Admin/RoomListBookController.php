<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoomRentalList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomListBookController extends Controller
{
    public function index(){
        $lists = RoomRentalList::all();
        return view('admin.room_lists.lists', compact('lists'));
//        test
    }
}
