<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index(){
        return view('admin.category.lists');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function edit()
    {
        return view('admin.category.edit');
    }

    public function update()
    {
        //
    }
}
