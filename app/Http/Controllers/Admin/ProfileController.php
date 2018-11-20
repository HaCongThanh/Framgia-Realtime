<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Couchbase\UserSettings;
use DB;
use Monolog\Handler\SyslogUdp\UdpSocket;
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

                User::where('id', $id)->update([
                    'name' => $request->name,
                    'mobile' => $request->mobile,
                    'address' => $request->address,
                    'gender' => $request->gender,
                    'type' => 1,
                    'birthday'  => $request->birthday,
                    'review' => $request->review,
                ]);

                DB::commit();

                return response()->json([
                    'error'     =>  false,
                    'message'   =>  'Sửa nhân viên thành công !',
                    'data' => $request->all(),
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
    public function uploadImage(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $image = $request->file('image_user');
        $img = $this->saveImage($image);
        $user->avatar = $img;
        $user->save();
        return back()->with('success', trans('message.success'));
    }

    public function saveImage($image)
    {
//        save in storage
        $filenameWithExt = $image->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();
        $newName = $filename . '_' . time() . '.' . $extension;
        $path = $image->move('images/avatar/', $newName);
        return $newName;
    }
}
