<?php

namespace App\Http\Controllers\User;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Validator;
use DB;

class PostController extends Controller
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
        $posts = Post::paginate(3);

        if ($request->ajax()) {
            return response()->json(view('user.post_list_ajax', [
                'posts' => $posts
            ])->render());  
        }

        return view('user.post_list', [
            'posts'    =>  $posts
        ]);
    }

    /**
     * [show description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show($id)
    {
        $post = Post::find($id);

        $diff_posts = Post::where('id', '!=', $id)->orderBy('id', 'desc')->limit(3)->get();

        return view('user.post_detail', [
            'post'    		=>  $post,
            'diff_posts'    =>  $diff_posts
        ]);
    }

}
