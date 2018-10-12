<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;

class RegisterController extends Controller
{
    /**
     * [__construct description]
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * [registerForm description]
     * @return [type] [description]
     */
    public function registerForm() {
        return view('auth.register');
    }

    /**
     * [register description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function register(Request $request) {
        $rules = [
            'name'      =>  'required|string|max:255',
            'email'     =>  'required|string|max:255|email|unique:users',
            'password'  =>  'required|string|min:6|confirmed'
        ];

        $messages = [
            'name.required'         =>  'Vui lòng nhập đầy đủ họ tên',
            'name.string'           =>  'Họ tên không được có ký tự đặc biệt',
            'name.max'              =>  'Xin lỗi, họ tên không quá 255 ký tự',
            'email.required'        =>  'Email là trường bắt buộc',
            'email.string'          =>  'Email không được có ký tự đặc biệt',
            'email.max'             =>  'Xin lỗi, Email không quá 255 ký tự',
            'email.email'           =>  'Email không đúng định dạng',
            'email.unique'          =>  'Tài khoản đã tồn tại',
            'password.required'     =>  'Mật khẩu là trường bắt buộc',
            'password.string'       =>  'Mật khẩu không được có ký tự đặc biệt',
            'password.min'          =>  'Mật khẩu phải chứa ít nhất 6 ký tự',
            'password.confirmed'    =>  'Nhập lại mật khẩu không khớp',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');

            $password = $request->input('password_confirmation');

            $name = $request->input('name');

            User::create([
                'name'      =>  $name,
                'email'     =>  $email,
                'password'  =>  Hash::make($password),
            ]);

            return redirect()->route('user.login_form');
        }
    }

}
