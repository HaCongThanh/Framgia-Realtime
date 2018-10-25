<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Models\CustomerBookingLog;
use App\Models\User;
use Validator;
use Entrust;
use DB;


class CustomerBookingLogController extends Controller
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
        return view('admin.customer_booking_logs.index');
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
     * [getCustomerBookingLogs : Lấy ra những hóa đơn của khách hàng]
     * @return [type] [description]
     */
    public function getCustomerBookingLogs()
    {
        $customer_booking_logs = CustomerBookingLog::orderBy('id', 'desc')->get();

        return Datatables::of($customer_booking_logs)
            ->addIndexColumn()

            ->editColumn('name', function($customer_booking_log){

                return $customer_booking_log->users->name;
            })

            ->editColumn('start_date', function($customer_booking_log){

                return date('d-m-Y', strtotime($customer_booking_log->start_date));
            })

            ->editColumn('end_date', function($customer_booking_log){
                
                return date('d-m-Y', strtotime($customer_booking_log->end_date));
            })

            ->editColumn('total_money', function($customer_booking_log){
                
                return number_format($customer_booking_log->total_money) . ' VNĐ';
            })

            ->editColumn('action2', function ($customer_booking_log){
                $string = '';

                if ($customer_booking_log->status == 1) {
                    $string = '<input type="hidden" id="checked-'. $customer_booking_log->id .'" value="1">';

                    $string = $string . '<i id="action-'. $customer_booking_log->id .'" class="fa fa-check-circle" data-tooltip="tooltip"  title="Đã xác nhận" onclick="updateStatus('. $customer_booking_log->id .')" aria-hidden="true" style="cursor: pointer; color: #3598dc; font-size: 20px;"></i>';
                } else {
                    $string = '<input type="hidden" id="checked-'. $customer_booking_log->id .'" value="0">';

                    $string = $string . '<i id="action-'. $customer_booking_log->id .'" class="fa fa-circle-o" data-tooltip="tooltip" title="Chưa xác nhận" onclick="updateStatus('. $customer_booking_log->id .')" aria-hidden="true" style="cursor: pointer; color: #3598dc; font-size: 20px;"></i>';
                }

                return $string;
            })

            ->addColumn('action', function ($customer_booking_log) {
                $string = '';

                // if (Entrust::hasRole(['super-admin'])) {
                    $string = $string . '<a data-toggle="modal" data-target="#bills" class="text-gray clear-bills" onclick="bills('. $customer_booking_log->id .');" title="'. __('messages.view') .'"><i class="fa fa-credit-card" style="font-size: 18px; cursor: pointer;"></i></a>';
                // }

                // if (Entrust::can(['edit-posts'])) {
                    // if (strtotime('+1 day', time()) < strtotime($customer_booking_log->start_date)) {
                        $string = $string . '&nbsp;&nbsp;&nbsp;&nbsp;' . '<a class="text-gray clear-bills" onclick="cancelReservation('. $customer_booking_log->id .');" title="'. __('Hủy hóa đơn') .' "><i class="fa fa-times-circle" style="font-size: 18px; cursor: pointer;"></i></a>';
                    // }
                // }

                return $string;
            })

        ->make(true);
    }

    /**
     * [updateStatus : Xác nhận đơn đặt phòng]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateStatus(Request $request)
    {
        if ($request->checked == 1) {
            CustomerBookingLog::where('id', $request->customer_booking_log_id)->update([
                'status'    =>  0
            ]);

            return response()->json([
                'error' => false,
                'message' => 'deactivate'
            ], 200);
        } else {
            CustomerBookingLog::where('id', $request->customer_booking_log_id)->update([
                'status'    =>  1
            ]);

            return response()->json([
                'error' => false,
                'message' => 'activate'
            ], 200);
        } 
    }

    /**
     * [getCustomerBookingDetail : Lấy chi tiết hóa đơn]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getCustomerBookingDetail(Request $request)
    {
        $customer_booking_log_id = $request->customer_booking_log_id;

        /*Lấy ra tổng số đêm*/
        $customer_booking_log = CustomerBookingLog::find($customer_booking_log_id);

        $start_date = $customer_booking_log->start_date;

        $end_date = $customer_booking_log->end_date;

        $night_count = abs((strtotime($start_date) - strtotime($end_date)) / 86400);
        /*------------------*/

        $user = User::find($customer_booking_log->user_id);

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
}
