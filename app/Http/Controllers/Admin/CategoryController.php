<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Validator;
use Entrust;
use DB;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'CheckAdmin']);
        $this->middleware('permission:view-categories')->only(['index', 'getCategories']);
        $this->middleware('permission:add-categories')->only(['create', 'store']);
        $this->middleware('permission:detail-categories')->only(['show']);
        $this->middleware('permission:edit-categories')->only(['edit', 'update']);
        $this->middleware('permission:delete-categories')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        DB::beginTransaction();

        try {
            $rules = [
                'name' => 'required|unique:categories',
            ];

            $messages = [
                'name.required' => __('messages.category') . __('messages.required'),
                'name.unique' => __('messages.category') . __('messages.unique'),
            ];

            $validator = Validator::make($data, $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'error' => 'valid',
                    'message' => $validator->errors(),
                ]);
            } else {
                Category::create([
                    'name' => $request->name,
                ]);

                DB::commit();

                return response()->json([
                    'error' => false,
                    'message' => __('messages.success'),
                ]);
            }
        } catch (Exception $e) {
            DB::rollback();

            return response()->json([
                'error' => true,
                'message' => __('messages.fail'),
            ]);
        }
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
        DB::beginTransaction();

        try {
            $category = Category::findOrFail($id);

            DB::commit();

            return response()->json([
                'error' => false,
                'message' => __('messages.success'),
                'category' => $category,
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        DB::beginTransaction();

        try {
            $rules = [
                'name' => 'required|unique:categories',
            ];

            $messages = [
                'name.required' => __('messages.category') . __('messages.required'),
                'name.unique' => __('messages.category') . __('messages.unique'),
            ];

            $validator = Validator::make($data, $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'error' => 'valid',
                    'message' => $validator->errors(),
                ]);
            } else {
                Category::where('id', $id)->update([
                    'name' => $request->name,
                ]);

                DB::commit();

                return response()->json([
                    'error' => false,
                    'message' => __('messages.success'),
                ]);
            }
        } catch (Exception $e) {
            DB::rollback();

            return response()->json([
                'error' => true,
                'message' => __('messages.fail'),
            ]);
        }
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
            DB::table('categories')->where('id', $id)->delete();

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
     * [getCategories description]
     * @return [type] [description]
     */
    public function getCategories()
    {
        $categories = Category::orderBy('id', 'desc')->get();

        return Datatables::of($categories)
            ->addIndexColumn()

            ->addColumn('action', function ($category) {
                if (Entrust::can(['edit-categories'])) {
                    $editCategories = 1;
                } else {
                    $editCategories = 0;
                }

                if (Entrust::can(['delete-categories'])) {
                    $deleteCategories = 1;
                } else {
                    $deleteCategories = 0;
                }

                return [
                    'editCategories' => $editCategories,
                    'deleteCategories' => $deleteCategories,
                    'categoryId' => $category->id,
                ];
            })

        ->make(true);
    }
}
