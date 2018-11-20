<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use Validator;
use Entrust;
use Auth;
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
        $this->middleware(['auth', 'CheckAdmin']);
        $this->middleware('permission:view-posts')->only(['index', 'getPosts']);
        $this->middleware('permission:add-posts')->only(['create', 'store']);
        $this->middleware('permission:detail-posts')->only(['show']);
        $this->middleware('permission:edit-posts')->only(['edit', 'update']);
        $this->middleware('permission:delete-posts')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');

        return view('admin.posts.create', compact('categories'));
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

            while (file_exists('images/posts/'.$new_name)) {
                $new_name = str_random(4).'_'.$new_name;
            }

            $image->move('images/posts/', $new_name);
        }

        $post = new Post(array(
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'description' => $request->get('description'),
            'content' => $request->get('content'),
            'status' => $request->get('status'),
            'user_id' => Auth::id(),
            'image' => $new_name
        ));

        $post->save();
        $post->categories()->sync($request->get('category'));

        return redirect()->route('posts.index');
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

        return view('admin.posts.edit', compact('post', 'categories', 'selectedCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $new_name = str_random(3).'_'.$image->getClientOriginalName();

            while (file_exists('images/posts/'.$new_name)) {
                $new_name = str_random(3).'_'.$new_name;
            }

            $image->move('images/posts/', $new_name);

            if (file_exists('images/posts/'.$post->image)) {
                unlink('images/posts/'.$post->image);
            }

            $post->image = $new_name;
        }

        $post->title = $request->get('title');
        $post->slug = $request->get('slug');
        $post->content = $request->get('content');
        $post->description = $request->get('description');
        $post->status = $request->get('status');

        $post->save();
        $post->categories()->sync($request->get('category'));

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            DB::table('posts')->where('id', $id)->delete();

            DB::commit();

            return response()->json([
                'error' => false,
                'message' => __('messages.success'),
            ]);
        } catch (Exception $e) {
            DB::rollback();

            return response()->json([
                'error' => true,
                'message' => __('messages.fail'),
            ]);
        }
    }

    /**
     * [getPosts description]
     * @return [type] [description]
     */
    public function getPosts()
    {
        $posts = Post::orderBy('id', 'desc')->get();

        return Datatables::of($posts)
            ->addIndexColumn()

            ->editColumn('action2', function ($post) {
                $image = '<img src="/images/posts/' . $post->image . '" width="100">';

                return $image;
            })

            ->editColumn('name', function ($post) {
                $name = $post->title;

                return $name;
            })

            ->editColumn('category_id', function ($post) {
                foreach ($post->categories as $category)
                {
                    return $category->name;
                }
            })

            ->editColumn('user_id', function ($post) {
                $userName = $post->users->name;

                return $userName;
            })

            ->editColumn('status', function ($post) {
                if ($post->status == 0) {
                    $txt = 'Private';
                } else {
                    $txt = 'Public';
                }
                
                return $txt;
            })

            ->addColumn('action', function ($post) {
                if (Entrust::can(['edit-posts'])) {
                    $editPosts = 1;
                } else {
                    $editPosts = 0;
                }

                if (Entrust::can(['delete-posts'])) {
                    $deletePosts = 1;
                } else {
                    $deletePosts = 0;
                }

                return [
                    'editPosts' => $editPosts,
                    'deletePosts' => $deletePosts,
                    'postId' => $post->id,
                ];
            })

        ->make(true);
    }
}
