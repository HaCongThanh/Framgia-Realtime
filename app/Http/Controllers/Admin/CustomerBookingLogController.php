<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Models\CustomerBookingLog;
use App\Models\User;
use App\Models\CustomerCare;
use App\Models\EmailTemplate;
use Validator;
use Entrust;
use Mail;
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
        $email_templates = EmailTemplate::orderBy('id','desc')->get();

        $customer_field = CustomerCare::getCustomerField();

        $customer_booking_log_field = CustomerCare::getCustomerBookingLogField();

        return view('admin.customer_booking_logs.index', [
            'customer_field'                =>  $customer_field,
            'email_templates'               =>  $email_templates,
            'customer_booking_log_field'    =>  $customer_booking_log_field
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

            ->editColumn('name', function($customer_booking_log) {

                return $customer_booking_log->users->name;
            })

            ->editColumn('start_date', function($customer_booking_log) {

                return date('d-m-Y', strtotime($customer_booking_log->start_date));
            })

            ->editColumn('end_date', function($customer_booking_log) {
                
                return date('d-m-Y', strtotime($customer_booking_log->end_date));
            })

            ->editColumn('total_money', function($customer_booking_log) {
                
                return number_format($customer_booking_log->total_money) . ' VNĐ';
            })

            ->editColumn('action2', function($customer_booking_log) {
                $string = '';

                if ($customer_booking_log->status == 1) {
                    $string = '<input type="hidden" id="checked-'. $customer_booking_log->id .'" value="1">';

                    $string = $string . '<i id="action-'. $customer_booking_log->id .'" class="fa fa-check-circle" data-tooltip="tooltip"  title="Đã xác nhận" onclick="updateStatus('. $customer_booking_log->id .')" aria-hidden="true" style="cursor: pointer; color: #28a745; font-size: 20px;"></i>';
                } else {
                    $string = '<input type="hidden" id="checked-'. $customer_booking_log->id .'" value="0">';

                    $string = $string . '<i id="action-'. $customer_booking_log->id .'" class="fa fa-circle-o" data-tooltip="tooltip" title="Chưa xác nhận" onclick="updateStatus('. $customer_booking_log->id .')" aria-hidden="true" style="cursor: pointer; color: #28a745; font-size: 20px;"></i>';
                }

                return $string;
            })

            ->addColumn('action', function($customer_booking_log) {
                $string = '';

                // if (Entrust::hasRole(['super-admin'])) {
                    $string = $string . '<a data-toggle="modal" data-target="#bills" class="text-gray clear-bills" onclick="bills('. $customer_booking_log->id .');" title="'. __('messages.view') .'"><i class="fa fa-credit-card" style="font-size: 18px; cursor: pointer; color: #3598dc;"></i></a>';
                // }
                
                // if (Entrust::hasRole(['super-admin'])) {
                    $string = $string . '&nbsp;&nbsp;&nbsp;&nbsp;' . '<a data-toggle="modal" data-target="#customerCare" data-tooltip="tooltip" class="text-gray" onclick="customerCare('. $customer_booking_log->id .');" title="Chăm sóc khách hàng"><i class="ti-heart" style="font-size: 17px; cursor: pointer; color: red;"></i></a>';
                // }

                // if (Entrust::can(['edit-posts'])) {
                    // if (strtotime('+1 day', time()) < strtotime($customer_booking_log->start_date)) {
                        $string = $string . '&nbsp;&nbsp;&nbsp;&nbsp;' . '<a class="text-gray clear-bills" onclick="cancelReservation('. $customer_booking_log->id .');" title="'. __('Hủy hóa đơn') .' "><i class="fa fa-times-circle" style="font-size: 18px; cursor: pointer; color: #e83e8c;"></i></a>';
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

    /**
     * [getInfoCustomerCare : Lấy thông tin của khách hàng và hóa đơn đó]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getInfoCustomerCare(Request $request)
    {
        $customer_booking_log = CustomerBookingLog::find($request->customer_booking_log_id);

        $customer = User::find($customer_booking_log->user_id);

        return response()->json([
            'error'                     =>  false,
            'message'                   =>  'Lấy thông tin thành công!',
            'customer'                  =>  $customer,
            'customer_booking_log_id'   =>  $customer_booking_log->id
        ]);
    }

    /**
     * [customerCareHistory : Lấy lịch sử chăm sóc khách hàng]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function customerCareHistory(Request $request) {
        $customer_cares = CustomerCare::where('user_id', $request->user_id)
                                    ->where('customer_booking_log_id', $request->customer_booking_log_id)
                                    ->orderBy('id', 'desc')
                                    ->get();

        return Datatables::of($customer_cares)
            ->addIndexColumn()

            ->editColumn('content', function($customer_care) {
                if (strlen($customer_care->content) > 300) {
                    return substr($customer_care->content, 0, 294)." . . .";
                } else {
                    return $customer_care->content;
                }
            })

            ->editColumn('type', function($customer_care) {
                if ($customer_care->type == 1) {
                    $customer_care->type = 'Gọi điện thoại';
                } elseif ($customer_care->type == 2){
                    $customer_care->type = 'Gửi tin nhắn';
                } elseif ($customer_care->type == 3){
                    $customer_care->type = 'Gửi Email';
                }

                return $customer_care->type;
            })

            ->editColumn('status', function($customer_care) {
                switch ($customer_care->status) {
                    case 1:
                    $customer_care->status = 'Đã nghe máy';
                    break;
                    case 2:
                    $customer_care->status = 'Không nghe máy';
                    break;
                    case 3:
                    $customer_care->status = 'Thuê bao không liên lạc được';
                    break;
                    case 4:
                    $customer_care->status = 'Đã gửi tin nhắn';
                    break;
                    case 5:
                    $customer_care->status = 'Đã gửi Email';
                    break;
                }

                return $customer_care->status;
            })

            ->editColumn('created_at', function($customer_care) {
                return $customer_care->created_at->format('H:m | d-m-Y');
            })

            ->editColumn('carer_id', function($customer_care) {
                $user = User::find($customer_care->carer_id);

                return $customer_care->carer_id = $user->name;
            })

        ->make(true);
    }

    /**
     * [saveCustomerCall : Lưu cuộc gọi chăm sóc khách hàng]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function saveCustomerCall(Request $request)
    {
        $carer = Auth::user();

        $data = $request->all();

        DB::beginTransaction();

        try {
            $rules = [
                'content'   =>  'required',
            ];

            $messages = [
                'content.required'  =>  'Nội dung cuộc gọi không được bỏ trống!',
            ];

            $validator = Validator::make($data, $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'error'   =>  'valid',
                    'message' =>  $validator->errors()
                ]);
            } else {
                CustomerCare::create([
                    'user_id'                   =>  $request->user_id,
                    'carer_id'                  =>  $carer->id,
                    'customer_booking_log_id'   =>  $request->customer_booking_log_id,
                    'title'                     =>  'Gọi điện',
                    'content'                   =>  $request->content,
                    'type'                      =>  1,  // Gọi điện thoại
                    'status'                    =>  $request->status
                ]);

                DB::commit();

                return response()->json([
                    'error'     =>  false,
                    'message'   =>  'Thêm mới cuộc gọi chăm sóc khách hàng thành công!'
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
            'message'   =>  'Thêm mới cuộc gọi chăm sóc khách hàng thành công!'
        ]);
    }

    /**
     * [saveCustomerMessages : Lưu tin nhắn chăm sóc khách hàng]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function saveCustomerMessages(Request $request)
    {
        $carer = Auth::user();

        $data = $request->all();

        DB::beginTransaction();

        try {
            $rules = [
                'content'   =>  'required',
            ];

            $messages = [
                'content.required'  =>  'Nội dung tin nhắn không được bỏ trống!',
            ];

            $validator = Validator::make($data, $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'error'   =>  'valid',
                    'message' =>  $validator->errors()
                ]);
            } else {
                CustomerCare::create([
                    'user_id'                   =>  $request->user_id,
                    'carer_id'                  =>  $carer->id,
                    'customer_booking_log_id'   =>  $request->customer_booking_log_id,
                    'title'                     =>  'Gửi tin nhắn',
                    'content'                   =>  $request->content,
                    'type'                      =>  2,  // Gửi tin nhắn
                    'status'                    =>  4   // Đã gửi tin nhắn
                ]);

                DB::commit();

                return response()->json([
                    'error'     =>  false,
                    'message'   =>  'Thêm mới tin nhắn chăm sóc khách hàng thành công!'
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
            'message'   =>  'Thêm mới tin nhắn chăm sóc khách hàng thành công!'
        ]);
    }

    /**
     * [customerCareEmailTemplate : Lấy ra các mẫu Email chăm sóc khách hàng]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function customerCareEmailTemplate(Request $request){
        $email_templates = EmailTemplate::orderBy('id', 'desc')->get();

        return Datatables::of($email_templates)
            ->addIndexColumn()

            ->addColumn('action', function($email_template) {
                $txt = '<a class="btn btn-xs blue view_template" data-tooltip="tooltip" title="Xem chi tiết" data-toggle="modal" data-target="#viewTemplate" onclick="funcViewTemp('. $email_template->id .')"><i class="fa fa-eye" aria-hidden="true" style="font-size: 18px; cursor: pointer; color: #20c997;"></i></a>

                <a class="btn btn-xs yellow edit_template" data-tooltip="tooltip" title="Chỉnh sửa" data-toggle="modal" data-target="#addTemplate" onclick="editEmailTemplate(' . $email_template->id . ')"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 18px; cursor: pointer; color: #ffc107;"></i></a>

                <a class="btn btn-xs" data-tooltip="tooltip" title="Xóa" onclick="deleteEmailTemplate('. $email_template->id .')"><i class="fa fa-trash" aria-hidden="true" style="font-size: 18px; cursor: pointer; color: #fd3259;"></i></a>';

                return $txt;
            })

        ->make(true);
    }

    /**
     * [createEmailTemplate : Lưu mẫu Email mới]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function createEmailTemplate(Request $request)
    {
        $data = $request->all();

        DB::beginTransaction();

        try {
            $rules = [
                'name'   =>  'unique:email_templates',
            ];

            $messages = [
                'name.unique'  =>  'Tên mẫu Email này đã tồn tại!',
            ];

            $validator = Validator::make($data, $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'error'   =>  'valid',
                    'message' =>  $validator->errors()
                ]);
            } else {
                EmailTemplate::create([
                    'name'      =>  $request->name,
                    'title'     =>  $request->title,
                    'content'   =>  $request->content
                ]);

                DB::commit();

                return response()->json([
                    'error'     =>  false,
                    'message'   =>  'Thêm mới mẫu Email thành công!'
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
            'message'   =>  'Thêm mới mẫu Email thành công!'
        ]);
    }

    /**
     * [editEmailTemplate description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function editEmailTemplate(Request $request)
    {
        $email_templates = EmailTemplate::where('id', $request->id)->get();

        return $email_templates;
    }

    public function updateEmailTemplate(Request $request)
    {
        $data = $request->all();

        DB::beginTransaction();

        try {
            $rules = [
                'name'   =>  'unique:email_templates',
            ];

            $messages = [
                'name.unique'  =>  'Tên mẫu Email này đã tồn tại!',
            ];

            $validator = Validator::make($data, $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'error'   =>  'valid',
                    'message' =>  $validator->errors()
                ]);
            } else {
                EmailTemplate::where('id', $request->id)->update([
                    'name'      =>  $request->name,
                    'title'     =>  $request->title,
                    'content'   =>  $request->content
                ]);

                DB::commit();

                return response()->json([
                    'error'     =>  false,
                    'message'   =>  'Cập nhật mẫu Email thành công!'
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
            'message'   =>  'Cập nhật mẫu Email thành công!'
        ]);
    }

    /**
     * [deleteEmailTemplate description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function deleteEmailTemplate(Request $request)
    {
        DB::beginTransaction();

        try {
            EmailTemplate::where('id', $request->id)->delete();

            DB::commit();

            return response()->json([
                'error'     =>  false,
                'message'   =>  'Xóa mẫu Email thành công!'
            ]);
        } catch(Exception $e) {
            return response()->json([
                'error'         => true,
                'message'       => 'Fail !'
            ]);
        }
        
        return response()->json([
            'error'     =>  false,
            'message'   =>  'Xóa mẫu Email thành công!'
        ]);
    }

    /**
     * [convertEmailContent description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function convertEmailContent(Request $request)
    {
        $user = User::where('id', $request->user_id)->get();

        $customer_booking_log = CustomerBookingLog::where('id', $request->customer_booking_log_id)->get();

        $replace_content = CustomerCare::rereplace_content($request->content, $user, $customer_booking_log);

        return $replace_content;
    }

    /**
     * [sendEmailCustomerCare description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function sendEmailCustomerCare(Request $request) {
        $carer = Auth::user();

        DB::beginTransaction();

        try {
            $nameUser = 'Framgia Hotel';

            $emailCustomer = $request->emailCustomer;

            $title = $request->title;

            $nameCustomer = $request->nameCustomer;

            $content = $request->content;

            Mail::send('admin.customer_booking_logs.email', [
                'content' => $content,
                'nameCustomer' => $nameCustomer,
                'nameUser' => $nameUser
            ], function ($messages) use ($title, $emailCustomer, $nameUser, $nameCustomer) {
                $messages->to($emailCustomer, $nameCustomer)->subject($title);
                $messages->from(env('MAIL_USERNAME'), $nameUser);
            });

            CustomerCare::create([
                'user_id'                   =>  $request->idCustomer,
                'carer_id'                  =>  $carer->id,
                'customer_booking_log_id'   =>  $request->customer_booking_log_id,
                'title'                     =>  $title,
                'content'                   =>  $content,
                'type'                      =>  3,  // Gửi Email
                'status'                    =>  5,  // Đã gửi Email
            ]);

            DB::commit();

            return response()->json([
                'error' => false,
                'message' => 'Success',
            ]);
        } catch (Exception $e) {
            DB::rollback();

            return response()->json([
                'error' => true,
                'message' => 'Fail',
            ]);
        }

        return response()->json([
            'error' => false,
            'message' => 'Success',
        ]);
    }
}
