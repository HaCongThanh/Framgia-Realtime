<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomTypesController extends Controller
{
    public function index(){
        return view('admin.room_types.lists');
    }

    public function create(){
        return view('admin.room_types.create');
    }

    public function edit(){
        return view('admin.room_types.edit');
    }

    public function update(){
        //
    }
}
