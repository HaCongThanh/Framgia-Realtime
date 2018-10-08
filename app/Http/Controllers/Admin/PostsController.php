<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index(){
        return view('admin.post.lists');
    }

    public function create(){
        return view('admin.post.create');
    }

    public function edit(){
        return view('admin.post.create');
    }

    public function update(){
        //
    }
}
