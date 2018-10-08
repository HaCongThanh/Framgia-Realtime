<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{
    public function index(){
        return view('admin.rooms.lists');
    }

    public function create(){
        return view('admin.rooms.create');
    }

    public function edit(){
        return view('admin.rooms.edit');
    }

    public function update(){
        //
    }
}
