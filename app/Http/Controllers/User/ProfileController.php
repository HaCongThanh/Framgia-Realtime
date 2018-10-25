<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\CustomerBookingLog;
use App\Models\Revenue;
use Validator;
use Entrust;
use DB;

class ProfileController extends Controller
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
        return view('user.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();

        return response()->json([
            'error'     =>  false,
            'message'   =>  'Lấy thông tin thành công!',
            'profile'   =>  $user,
            'birthday'  =>  date('m/d/Y', strtotime($user->birthday))
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
        $user = Auth::user();

        $data = $request->all();

        DB::beginTransaction();

        try {
            $rules = [
                'name'      =>  'required|string|max:255',
                'mobile'    =>  'required|min:10|max:50',
                'address'   =>  'required|string|max:255',
                'birthday'  =>  'required|date|date_format:m/d/Y',
            ];

            $messages = [
                'name.required'         =>  'Họ và tên không được bỏ trống',
                'name.string'           =>  'Họ tên không được có ký tự đặc biệt',
                'name.max'              =>  'Xin lỗi, họ tên không quá 255 ký tự',
                'mobile.required'       =>  'Số điện thoại không được bỏ trống',
                'mobile.min'            =>  'Số điện thoại phải là từ 10 số trở lên',
                'mobile.max'            =>  'Số điện thoại không dài quá 50 số',
                'address.required'      =>  'Địa chỉ của bạn không được bỏ trống',
                'address.string'        =>  'Địa chỉ không được có ký tự đặc biệt',
                'address.max'           =>  'Xin lỗi, địa chỉ không quá 255 ký tự',
                'birthday.required'     =>  'Ngày sinh của bạn không được bỏ trống',
                'birthday.date'         =>  'Ngày sinh phải là ngày tháng',
                'birthday.date_format'  =>  'Ngày sinh không đúng định dạng',
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
                    'address'   =>  $request->address,
                    'birthday'  =>  date_format(date_create($request->birthday), 'Y-m-d'),
                    'review'    =>  $request->review
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
        
        return response()->json([
            'error'     =>  false,
            'message'   =>  'Cập nhật thông tin thành công!'
        ]);
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
     * [getProfile : Lấy thông tin của user]
     * @return [type] [description]
     */
    public function getProfile()
    {
        $profile = Auth::user();

        return response()->json([
            'error'     =>  false,
            'message'   =>  'Thêm session thành công!',
            'profile'   =>  $profile
        ]);
    }

    /**
     * [getCustomerBookingLog : Lấy ra những hóa đơn của user]
     * @return [type] [description]
     */
    public function getCustomerBookingLog()
    {
        $user = Auth::user();

        $customer_booking_logs = CustomerBookingLog::where('user_id', $user->id)->orderBy('id', 'desc')->get();

        return Datatables::of($customer_booking_logs)
            ->addIndexColumn()

            ->editColumn('start_date', function($customer_booking_log){

                return date('d-m-Y', strtotime($customer_booking_log->start_date));
            })

            ->editColumn('end_date', function($customer_booking_log){
                
                return date('d-m-Y', strtotime($customer_booking_log->end_date));
            })

            ->editColumn('total_money', function($customer_booking_log){
                
                return number_format($customer_booking_log->total_money) . ' VNĐ';
            })

            ->addColumn('action', function ($customer_booking_log) {
                $string = '';

                // if (Entrust::hasRole(['super-admin'])) {
                    $string = $string . '<a data-toggle="modal" data-target="#bills" class="text-gray clear-bills" onclick="bills('. $customer_booking_log->id .');" title="'. __('messages.view') .'"><i class="fa fa-credit-card" style="font-size: 18px;"></i></a>';
                // }

                // if (Entrust::can(['edit-posts'])) {
                    if (strtotime('+1 day', time()) < strtotime($customer_booking_log->start_date)) {
                        $string = $string . '&nbsp;&nbsp;&nbsp;&nbsp;' . '<a class="text-gray clear-bills" onclick="cancelReservation('. $customer_booking_log->id .');" title="'. __('Hủy đặt phòng') .' "><i class="fa fa-times-circle" style="font-size: 18px;"></i></a>';
                    }
                // }

                return $string;
            })

        ->make(true);
    }

    /**
     * [getCustomerBookingDetail : Lấy chi tiết hóa đơn]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getCustomerBookingDetail(Request $request)
    {
        $user = Auth::user();

        $customer_booking_log_id = $request->customer_booking_log_id;

        /*Lấy ra tổng số đêm*/
        $customer_booking_log = CustomerBookingLog::find($customer_booking_log_id);

        $start_date = $customer_booking_log->start_date;

        $end_date = $customer_booking_log->end_date;

        $night_count = abs((strtotime($start_date) - strtotime($end_date)) / 86400);
        /*------------------*/

        $customer_booking_details = DB::table('customer_booking_details')
            ->join('customer_booking_logs', 'customer_booking_details.customer_booking_log_id', '=', 'customer_booking_logs.id')
            ->join('room_types', 'customer_booking_details.room_type_id', '=', 'room_types.id')
            ->where('customer_booking_details.customer_booking_log_id', $customer_booking_log_id)
            ->select([
                'room_types.name',
                'room_types.price',
                'customer_booking_details.number_room',
                'customer_booking_details.total_price',
                'customer_booking_logs.created_at',
                'customer_booking_logs.total_money',
                'customer_booking_logs.total_number_room',
                'customer_booking_logs.note'
                    ])
            ->get();

        return response()->json([
            'error'         =>  false,
            'message'       =>  'Lấy thông tin thành công!',
            'data'          =>  $customer_booking_details,
            'info'          =>  $user,
            'night_count'   =>  $night_count
        ]);
    }

    /**
     * [cancelReservation : Hủy đặt phòng]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function cancelReservation(Request $request)
    {
        /*Xóa trong bảng room_rental_lists*/
        DB::table('room_rental_lists')->where('customer_booking_log_id', $request->customer_booking_log_id)->delete();
        /*--------------------------------*/

        $customer_booking_log = CustomerBookingLog::find($request->customer_booking_log_id);

        /*Trừ doanh thu trong bảng revenues*/
        $revenue = Revenue::where('created_at', date('Y-m-d', strtotime($customer_booking_log->created_at)))->first();

        Revenue::where('id', $revenue->id)->update([
            'total_amount'  =>  $revenue->total_amount - $customer_booking_log->total_money,
            'updated_at'    =>  date('Y-m-d', time())
        ]);
        /*---------------------------------*/

        /*Xóa trong bảng customer_booking_logs*/
        DB::table('customer_booking_logs')->where('id', $request->customer_booking_log_id)->delete();
        /*------------------------------------*/

        return response()->json([
            'error'     =>  false,
            'message'   =>  'Hủy đặt phòng thành công!'
        ]);
    }
}
