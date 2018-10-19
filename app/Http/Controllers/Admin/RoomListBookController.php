<?php

namespace App\Http\Controllers\Admin;

use App\Models\CustomerBookingLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomListBookController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'CheckAdmin']);
    }

	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index(){
        $lists = CustomerBookingLog::Paginate(10);
        
        return view('admin.room_lists.lists', compact('lists'));
    }
}
