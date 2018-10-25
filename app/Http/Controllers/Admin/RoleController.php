<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Validator;
use Entrust;
use DB;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'CheckAdmin']);
        $this->middleware('permission:view-roles')->only(['index']);
        $this->middleware('permission:add-roles')->only(['create', 'store']);
        $this->middleware('permission:select-permission')->only(['show']);
        $this->middleware('permission:edit-roles')->only(['edit', 'update']);
        $this->middleware('permission:delete-roles')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.roles.index');
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
                'name'          =>  'required|string|unique:roles',
                'display_name'  =>  'required|string|unique:roles',
            ];

            $messages = [
                'name.required'         =>  'Vai trò không được bỏ trống',
                'name.string'           =>  'Vai trò không được có ký tự đặc biệt',
                'name.unique'           =>  'Vai trò đã tồn tại',
                'display_name.required' =>  'Tên hiển thị không được bỏ trống',
                'display_name.string'   =>  'Tên hiển thị không được có ký tự đặc biệt',
                'display_name.unique'   =>  'Tên hiển thị đã tồn tại',
            ];

            $validator = Validator::make($data, $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                  'error'   =>  'valid',
                  'message' =>  $validator->errors()
              ]);
            } else {
                Role::create([
                    'name'          =>  $request->name,
                    'display_name'  =>  $request->display_name,
                    'description'   =>  $request->description
                ]);

                DB::commit();

                return response()->json([
                    'error'     =>  false,
                    'message'   =>  'Thêm vai trò thành công !'
                ]);
            }
        } catch(Exception $e) {
            return response()->json([
                'error'         => true,
                'message'       => 'Fail !'
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
        return view('admin.roles.show', [
            'role_id'   =>  $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);

        return response()->json([
            'error' =>  false,
            'role'  =>  $role
        ]);
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
                'name'          =>  'required|string',
                'display_name'  =>  'required|string',
            ];

            $messages = [
                'name.required'         =>  'Vai trò không được bỏ trống',
                'name.string'           =>  'Vai trò không được có ký tự đặc biệt',
                'display_name.required' =>  'Tên hiển thị không được bỏ trống',
                'display_name.string'   =>  'Tên hiển thị không được có ký tự đặc biệt',
            ];

            $validator = Validator::make($data, $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                  'error'   =>  'valid',
                  'message' =>  $validator->errors()
              ]);
            } else {
                Role::where('id', $id)->update([
                    'name'          =>  $request->name,
                    'display_name'  =>  $request->display_name,
                    'description'   =>  $request->description
                ]);

                DB::commit();

                return response()->json([
                    'error'     =>  false,
                    'message'   =>  'Cập nhật trò thành công !'
                ]);
            }
        } catch(Exception $e) {
            return response()->json([
                'error'         => true,
                'message'       => 'Fail !'
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
            Role::where('id', $id)->delete();

            DB::commit();

            return response()->json([
                'error'     =>  false,
                'message'   =>  'Xóa vai trò thành công !'
            ]);
        } catch(Exception $e) {
            DB::rollback();

            return response()->json([
                'error'         => true,
                'message'       => 'Fail !'
            ]);
        }
    }

    /**
     * [getListRoles description]
     * 
     * @return [type] [description]
     */
    public function getListRoles()
    {
        $roles = Role::orderBy('created_at', 'desc')->get();

        return Datatables::of($roles)
            ->addIndexColumn()

            ->editColumn('created_at', function($role){
                $time = $role->created_at;

                $time_numb = strtotime($time);

                return date('H:i | d-m-Y', $time_numb);
            })

            ->addColumn('action', function ($role) {
                $string = '';

//                if (Entrust::hasRole(['super-admin', 'user'])) {
                    $string = $string .' <a href="'. route('roles.show', $role->id) .'" class="text-gray m-r-15" data-tooltip="tooltip" title="Quyền hạn"><i class="ti-shield" aria-hidden="true"></i></a>';
//                }

//                if (Entrust::can(['edit-posts'])) {
                    $string = $string . '<a href="javascript:;" data-id="'. $role->id .'" class="text-gray m-r-15 role_edit" data-tooltip="tooltip" title="Chỉnh sửa"><i class="ti-pencil" aria-hidden="true"></i></a>';
//                }

                // if (Entrust::can(['add-posts'])) {
                    $string = $string . '<a href="javascript:;" data-id="'. $role->id .'" class="text-gray role_delete" data-tooltip="tooltip" title="Xóa"><i class="ti-trash"></i></a>';
                // }

                return $string;
            })

        ->make(true);
    }

    /**
     * [getListPermissionRole description]
     * 
     * @return [type] [description]
     */
    public function getListPermissionRole($role_id)
    {
        $role = Role::find($role_id);

        $permissions = Permission::orderBy('id', 'desc')->get();

        return Datatables::of($permissions)
            ->addIndexColumn()

            ->editColumn('created_at', function($permission){
                $time = $permission->created_at;

                $time_numb = strtotime($time);

                return date('H:i | d-m-Y', $time_numb);
            })

            ->addColumn('action', function ($permission) use ($role){
                $flag = DB::table('permission_role')
                        ->where('role_id', $role->id)
                        ->where('permission_id', $permission->id)
                        ->where('deleted_at', null)
                        ->first();

                if ($flag != null) {
                    $string = '<input type="hidden" id="checked-'. $permission->id .'" value="1">';

                    $string = $string . '<i id="action-'. $permission->id. '" class="fa fa-check-circle" data-tooltip="tooltip"  title="Xóa" onclick="updatePermission('. $role->id . ', '. $permission->id .')" aria-hidden="true" style="cursor: pointer; color: #3598dc; font-size: 20px;"></i>';
                } else {
                    $string = '<input type="hidden" id="checked-' .$permission->id . '" value="0">';

                    $string = $string . '<i id="action-'. $permission->id .'" class="fa fa-circle-o" data-tooltip="tooltip" title="Thêm" onclick="updatePermission('. $role->id .', '. $permission->id .')" aria-hidden="true" style="cursor: pointer; color: #3598dc; font-size: 20px;"></i>';
                }

                return $string;
            })

        ->make(true);
    }

    /**
     * [updatePermissionRole description]
     * 
     * @return [type] [description]
     */
    public function updatePermissionRole(Request $request)
    {
        if ($request->checked == 1) {
            DB::table('permission_role')
                ->where('role_id', $request->role_id)
                ->where('permission_id', $request->permission_id)
                ->delete();

            return response()->json([
                'error' => false,
                'message' => 'deleted'
            ], 200);
        } else {
            DB::table('permission_role')->insert([
                'role_id'       =>  $request->role_id,
                'permission_id' =>  $request->permission_id,
                'created_at'    =>  date('Y-m-d H:m:s', time())
            ]);

            return response()->json([
                'error' => false,
                'message' => 'added'
            ], 200);
        } 
    }
}
