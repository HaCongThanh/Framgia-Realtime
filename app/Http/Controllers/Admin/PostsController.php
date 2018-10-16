<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('admin.post.lists', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');

        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_name = str_random(3).'_'.$image->getClientOriginalName();
            while (file_exists('public/images/post/'.$new_name)) {
                $new_name = str_random(4).'_'.$new_name;
            }
            $image->move('public/images/post', $new_name);
        }

        $post = new Post(array(
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'description' => $request->get('description'),
            'content' => $request->get('content'),
            'status' => $request->get('status'),
            'user_id' => 7,
            'image' => $new_name
        ));
        $post->save();
        $post->categories()->sync($request->get('category'));

        return redirect() -> route('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all()->pluck('name', 'id');
        $selectedCategories = $post->categories->pluck('id');
        return view('admin.post.edit', compact('post', 'categories', 'selectedCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, PostFormRequest $request)
    {
        $post = Post::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_name = str_random(3).'_'.$image->getClientOriginalName();
            while (file_exists('public/images/post/'.$new_name)) {
                $new_name = str_random(3).'_'.$new_name;
            }
            if (file_exists('public/images/post/'.$new_name)) {
                unlink('public/images/post/'.$post->image);
            }
            $image->move('public/images/post'.$new_name);
        }
        $post->title = $request->get('title');
        $post->slug = $request->get('slug');
        $post->content = $request->get('content');
        $post->description = $request->get('description');
        $post->status = $request->get('status');
        $post->image = $new_name;

        //dd($post);
        $post->save();
        $post->categories()->sync($request->get('categories'));
        return redirect()->route('post',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if (file_exists('public/images/post/' . $post->image)) {
            unlink('public/images/post/' . $post->image);
        }
        $post->delete();

        return redirect()->route('post');
    }
}
