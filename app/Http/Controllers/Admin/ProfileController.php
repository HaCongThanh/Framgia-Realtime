<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use DB;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
        //
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
        $users = User::where('id', $id)->first();

        return view('admin.profile.index', compact('users'));
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
                'name'         => 'required|string',
                'mobile'       => 'required|max:11',
                'address'      => 'required',
                'birthday'     => 'required',
            ];

            $messages = [
                'name.required'         =>  'Tên nhân viên không được bỏ trống',
                'name.string'           =>  'Tên nhân viên không được có ký tự đặc biệt',
                'mobile.required'       =>  'Số điện thoại không được bỏ trống',
                'mobile.max'            =>  'Số điện thoại phải không quá 11 số',
                'address.required'      =>  'Địa chỉ không được bỏ trống',
                'birthday.required'     =>  'Ngày sinh không được bỏ trống',
            ];

            $validator = Validator::make($data, $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'error'   =>  'valid',
                    'message' =>  $validator->errors()
                ]);
            } else {
                if ($request->hasFile('avatar')) {
                    $image = $request->file('avatar');

                    $new_name = str_random(3).'_'.$image->getClientOriginalName();

                    while (file_exists('images/avatar/'.$new_name)) {
                        $new_name = str_random(4).'_'.$new_name;
                    }

                    $image->move('images/avatar/', $new_name);
                }

                User::where('id', $id)->update([
                    'name'      => $request->name,
                    'mobile'    => $request->mobile,
                    'address'   => $request->address,
                    'review'    => $request->review,
                    'birthday'  => $request->birthday,
                    'gender'    => $request->gender,
                    'avatar'    => $new_name
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
        //
    }

    /**
     * update password.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword() {

    }
}
