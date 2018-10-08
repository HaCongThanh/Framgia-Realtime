<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomListBookController extends Controller
{
    public function index(){
        return view('admin.room_lists.lists');
    }
}
