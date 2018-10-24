<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;
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
        $this->middleware('auth');
    }

    /**
     * [updateInfo description]
     * @return [type] [description]
     */
    public function updateInfo(Request $request)
    {
        $user = Auth::user();

        $data = $request->all();

        DB::beginTransaction();

        try {
            $rules = [
                'name'      =>  'required|string|max:255',
                'mobile'    =>  'required|min:10|max:50',
                'address'   =>  'required|string|max:255',
            ];

            $messages = [
                'name.required'     =>  'Họ và tên không được bỏ trống',
                'name.string'       =>  'Họ tên không được có ký tự đặc biệt',
                'name.max'          =>  'Xin lỗi, họ tên không quá 255 ký tự',
                'mobile.required'   =>  'Số điện thoại không được bỏ trống',
                'mobile.min'        =>  'Số điện thoại phải là từ 10 số trở lên',
                'mobile.max'        =>  'Số điện thoại không dài quá 50 số',
                'address.required'  =>  'Địa chỉ của bạn không được bỏ trống',
                'address.string'    =>  'Địa chỉ không được có ký tự đặc biệt',
                'address.max'       =>  'Xin lỗi, địa chỉ không quá 255 ký tự',
            ];

            $validator = Validator::make($data, $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                  'error'   =>  'valid',
                  'message' =>  $validator->errors()
              ]);
            } else {
                User::where('id', $user->id)->update([
                    'name'      =>  $request->name,
                    'gender'    =>  $request->gender,
                    'mobile'    =>  $request->mobile,
                    'address'   =>  $request->address
                ]);

                DB::commit();

                return response()->json([
                    'error'     =>  false,
                    'message'   =>  'Cập nhật thông tin người dùng thành công !',
                    'name'      =>  $request->name,
                    'address'   =>  $request->address
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
     * [updatePayment description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updatePayment(Request $request)
    {
        $user = Auth::user();

        $data = $request->all();

        DB::beginTransaction();

        try {
            $rules = [
                'card_number'      =>  'required|string',
            ];

            $messages = [
                'card_number.required'     =>  'Số thẻ không được bỏ trống',
                'card_number.string'       =>  'Số thẻ không được có ký tự đặc biệt',
            ];

            $validator = Validator::make($data, $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                  'error'   =>  'valid',
                  'message' =>  $validator->errors()
              ]);
            } else {
                User::where('id', $user->id)->update([
                    'card_type'     =>  $request->card_type,
                    'card_number'   =>  $request->card_number,
                    'expire'        =>  $request->expire,
                    'year'          =>  $request->year
                ]);

                DB::commit();

                return response()->json([
                    'error'     =>  false,
                    'message'   =>  'Cập nhật thông tin người dùng thành công !'
                ]);
            }
        } catch(Exception $e) {
            return response()->json([
                'error'         => true,
                'message'       => 'Fail !'
            ]);
        }
    }

}
