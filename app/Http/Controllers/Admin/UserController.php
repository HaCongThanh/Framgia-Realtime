<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('type', 1)->orderBy('id', 'desc')->get();
        return view('admin.users.index', [
            'users' =>  $users
        ]);
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
                'name'         => 'required|string',
                'email'         => 'required|unique:users',
                'mobile'         => 'required|max:11',
                'address'         => 'required',
                'gender'         => 'required',
            ];

            $messages = [
                'name.required'         =>  'Tên nhân viên không được bỏ trống',
                'name.string'           =>  'Tên nhân viên không được có ký tự đặc biệt',
                'email.required' =>  'Email không được bỏ trống',
                'email.unique' =>  'Email đã tồn tại',
                'mobile.required'   =>  'Số điện thoại không được bỏ trống',
                'mobile.max'   =>  'Số điện thoại phải không quá 11 số',
                'address.required'   =>  'Địa chỉ không được bỏ trống',
                'gender.required'   =>  'Giới tính không được bỏ trống',
            ];

            $validator = Validator::make($data, $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'error'   =>  'valid',
                    'message' =>  $validator->errors()
                ]);
            } else {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'mobile' => $request->mobile,
                    'password' => Hash::make(123456),
                    'address' => $request->address,
                    'gender' => $request->gender,
                    'type' => 1
                ]);

                DB::commit();

                return response()->json([
                    'error'     =>  false,
                    'message'   =>  'Thêm nhân viên thành công !'
                ]);
            }
        } catch (Exception $e){
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
        $user = User::find($id);

        $roles = Role::orderBy('id', 'desc')->get();

        if (!empty($roles)) {
            foreach ($roles as $role) {
                $flag = DB::table('role_user')
                        ->where('user_id', $id)
                        ->where('role_id', $role->id)
                        ->where('deleted_at', null)
                        ->first();

                if ($flag != null) {
                    $role->checked = 1;
                } else {
                    $role->checked = 0;
                }
            }
        }

        return view('admin.users.show', [
            'user'  =>  $user,
            'roles' =>  $roles
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
        $user = User::find($id);

        return response()->json([
            'error' =>  false,
            'user'  =>  $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $re    quest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        DB::beginTransaction();

        try {
            $rules = [
                'name'         => 'required|string',
                'email'         => 'required',
                'mobile'         => 'required|max:11',
                'address'         => 'required',
                'gender'         => 'required',
            ];

            $messages = [
                'name.required'         =>  'Tên nhân viên không được bỏ trống',
                'name.string'           =>  'Tên nhân viên không được có ký tự đặc biệt',
                'email.required' =>  'Email không được bỏ trống',
                'mobile.required'   =>  'Số điện thoại không được bỏ trống',
                'mobile.max'   =>  'Số điện thoại phải không quá 11 số',
                'address.required'   =>  'Địa chỉ không được bỏ trống',
                'gender.required'   =>  'Giới tính không được bỏ trống',
            ];

            $validator = Validator::make($data, $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'error'   =>  'valid',
                    'message' =>  $validator->errors()
                ]);
            } else {
                User::where('id', $id)->update([
                    'name' => $request->name,
                    'mobile' => $request->mobile,
                    'address' => $request->address,
                    'gender' => $request->gender,
                    'type' => $request->type
                ]);

                DB::commit();

                return response()->json([
                    'error'     =>  false,
                    'message'   =>  'Sửa nhân viên thành công !'
                ]);
            }
        } catch (Exception $e){
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
            User::where('id', $id)->delete();

            DB::commit();

            return response()->json([
                'error'     =>  false,
                'message'   =>  'Xóa nhân viên thành công !'
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
     * [updateRoleUser description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateRoleUser(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        if ($request->checked == 1) {
            DB::table('role_user')
                ->where('user_id', $request->user_id)
                ->where('role_id', $request->role_id)
                ->delete();

            return response()->json([
                'error' => false,
                'message' => 'deleted'
            ], 200);
        } else {
            DB::table('role_user')->insert([
                'user_id'       =>  $request->user_id,
                'role_id'       =>  $request->role_id,
                'created_at'    =>  date('Y-m-d H:m:s', time())
            ]);

            return response()->json([
                'error' => false,
                'message' => 'added'
            ], 200);
        }
    }
}
