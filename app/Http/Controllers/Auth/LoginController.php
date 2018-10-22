<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * [loginForm description]
     * @return [type] [description]
     */
    public function loginForm() {
        return view('auth.login');
    }

    /**
     * [login description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function login(Request $request) {
        $rules = [
            'email'     =>  'required|string|max:255|email',
            'password'  =>  'required|string|min:6'
        ];

        $messages = [
            'email.required'    =>  'Email là trường bắt buộc',
            'email.string'      =>  'Email không được có ký tự đặc biệt',
            'email.max'         =>  'Xin lỗi, Email không quá 255 ký tự',
            'email.email'       =>  'Email không đúng định dạng',
            'password.required' =>  'Mật khẩu là trường bắt buộc',
            'password.string'   =>  'Mật khẩu không được có ký tự đặc biệt',
            'password.min'      =>  'Mật khẩu phải chứa ít nhất 6 ký tự',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');

            $password = $request->input('password');

            if(Auth::attempt(['email' => $email, 'password' => $password])) {
                return redirect()->route('dashboard');
            } else {
                $errors = new MessageBag(['password' => 'Email hoặc mật khẩu không đúng']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }

    /**
     * [logout description]
     * @return [type] [description]
     */
    public function logout(Request $request) {
        Auth::logout();

        return redirect()->route('user.login_form');
    }

}
