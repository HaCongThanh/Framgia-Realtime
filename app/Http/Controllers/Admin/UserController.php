<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use DB;

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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
