<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\RoomRentalList;
use App\Models\User;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Revenue;
use App\Models\CustomerBookingLog;
use App\Models\CustomerBookingDetail;
use Validator;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('checkOut');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->forget('route');
        
        session()->put('route', 'user.home.index');
        
        return view('user.home');
    }

    /**
     * Tìm phòng
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function findRooms(Request $request){
        $start_date = date_format(date_create($request->input('start_date')), 'Y-m-d'); // Ngày nhận phòng của khách
        $end_date   = date_format(date_create($request->input('end_date')), 'Y-m-d');   // Ngày trả phòng của khách
        $adults     = $request->input('adults');
        $children   = $request->input('children');

        if ($adults == 'Người lớn') {
            $adults = 1;
        }

        if ($children == 'Trẻ em') {
            $children = 0;
        }

        /*Lấy ra danh sách thuê phòng, sắp xếp từ bé đến lớn theo room_id và ngày nhận phòng*/
        $room_rental_lists = RoomRentalList::orderBy('room_id', 'asc')->orderBy('start_date', 'asc')->get();

        $min_date = $room_rental_lists->min('start_date');  // Lấy ngày nhận phòng nhỏ nhất
        $max_date = $room_rental_lists->max('end_date');    // Lấy ngày trả phòng lớn nhất

        $array_time = array();
        $array_room = array();
        $array_count = array();
        $array_room_type = array();

        if ($end_date <= $min_date || $start_date >= $max_date) {
            // Nếu (ngày nhận phòng của khách) nhỏ hơn (ngày nhận phòng nhỏ nhất) HOẶC (ngày trả phòng của khách) lớn hơn (ngày trả phòng lớn nhất): thì tất cả các phòng đều CÒN TRỐNG vào khoảng thời gian thuê đó.
            // dd('Tất cả các phòng đều còn trống vào khoảng thời gian bạn chọn.');

            $array_room_type_data = RoomType::all();

            $rooms = Room::all();

            foreach ($rooms as $room) {
                array_push($array_room_type, $room->room_type_id);
            }

            $array_count_room_type = array_count_values($array_room_type);
        } else {
            foreach ($room_rental_lists as $room_rental_list) {
                /*Đẩy thông tin từng phòng vào mảng*/
                array_push($array_time, [
                    'start_date'    =>  $room_rental_list->start_date,
                    'end_date'      =>  $room_rental_list->end_date,
                    'room_id'       =>  $room_rental_list->room_id
                ]);

                /*Đẩy ID phòng vào mảng đếm*/
                array_push($array_count, $room_rental_list->room_id);
            }

            /*Đếm những ID phòng trùng lặp trong mảng đếm*/
            $array_count = array_count_values($array_count);

            for ($i=0; $i < count($array_time); $i++) {
                $room_id = $array_time[$i]['room_id'];

                /*Nếu phòng đó mới chỉ tồn tại 1 bản ghi*/
                if ($array_count[$room_id] == 1) {
                    /*Nếu (ngày trả phòng của khách) nhỏ hơn (ngày nhận phòng của khách trước đã thuê) HOẶC (ngày nhận phòng của khách) lớn hơn (ngày trả phòng của khách trước đã thuê)*/
                    if ($end_date <= $array_time[$i]['start_date'] || $start_date >= $array_time[$i]['end_date']) {
                        array_push($array_room, $room_id);  // Đẩy ID phòng vào mảng
 
                        $room_type_id = Room::find($room_id)->room_type_id;

                        array_push($array_room_type, $room_type_id);
                    }
                } else {
                    /*Trong mảng này tồn tại nhiều bản ghi, vì thế phải kiểm tra xem bản ghi tiếp theo có phải cùng phòng đó ko*/
                    if ($array_time[$i]['room_id'] == $array_time[$i+1]['room_id']) {
                        /*Nếu (ngày trả phòng của khách A) nhỏ hơn (ngày nhận phòng của khách này) VÀ (ngày trả phòng của khách này) nhỏ hơn (ngày nhận phòng của khách B)*/
                        if ($array_time[$i]['end_date'] <= $start_date && $end_date <= $array_time[$i+1]['start_date']) {
                            array_push($array_room, $room_id);  // Đẩy ID phòng vào mảng

                            $room_type_id = Room::find($room_id)->room_type_id;

                            array_push($array_room_type, $room_type_id);
                        }
                    }
                }
            }

            /*Lấy những phòng còn trống trong bảng rooms với status = 0*/
            $rooms = Room::where('status', 0)->get();

            foreach ($rooms as $room) {
                array_push($array_room_type, $room->room_type_id);

                array_push($array_room, $room->id);
            }
            /*---------------------------------------------------------*/

            /*Đẩy mảng ID phòng còn trống vào Session*/
            session()->forget('array_room');
            session()->put('array_room', $array_room);

            $array_count_room_type = array_count_values($array_room_type);  //  Truyền ra view
            $array_unique_room_type = array_unique($array_room_type);
            // dd($array_unique_room_type);
            // dd($array_room);
            // $array_room = array_unique($array_room);
            
            $array_room_type_data = array();

            for ($i=0; $i < count($array_room_type); $i++) { 
                if (array_key_exists($i, $array_unique_room_type)) {
                    $room_type = RoomType::find($array_unique_room_type[$i]);

                    array_push($array_room_type_data, $room_type);  //  Truyền ra view
                }
            }
        }

        return view('user.booking', [
            'array_room_type_data'      =>  $array_room_type_data,
            'array_count_room_type'     =>  $array_count_room_type,
            'start_date'                =>  $_GET['start_date'],
            'end_date'                  =>  $_GET['end_date'],
            'adults'                    =>  $adults,
            'children'                  =>  $children
        ]);
    }

    /**
     * Lưu session
     * 
     * @return [type] [description]
     */
    public function sessionBookings(Request $request)
    {
        session()->forget('start_date');
        session()->put('start_date', $request->start_date);

        session()->forget('end_date');
        session()->put('end_date', $request->end_date);

        session()->forget('adults');
        session()->put('adults', $request->adults);

        session()->forget('children');
        session()->put('children', $request->children);

        session()->forget('total_number_room');
        session()->put('total_number_room', $request->total_number_room);

        session()->forget('total_money');
        session()->put('total_money', $request->total_money);

        session()->forget('rt1');
        session()->put('rt1', $request->rt1);

        session()->forget('rt2');
        session()->put('rt2', $request->rt2);

        session()->forget('rt3');
        session()->put('rt3', $request->rt3);

        session()->forget('rt4');
        session()->put('rt4', $request->rt4);

        session()->forget('rt5');
        session()->put('rt5', $request->rt5);

        session()->forget('rt6');
        session()->put('rt6', $request->rt6);

        session()->forget('rt7');
        session()->put('rt7', $request->rt7);

        session()->forget('rt8');
        session()->put('rt8', $request->rt8);

        session()->forget('rt9');
        session()->put('rt9', $request->rt9);

        session()->forget('rt10');
        session()->put('rt10', $request->rt10);

        return response()->json([
            'error'     =>  false,
            'message'   =>  'Thêm session thành công!'
        ]);
    }

    /**
     * Thực hiện Checkout
     * 
     * @return [type] [description]
     */
    public function checkOut()
    {
        $user = Auth::user();

        return view('user.checkout', [
            'start_date'        =>  session()->get('start_date'),
            'end_date'          =>  session()->get('end_date'),
            'adults'            =>  session()->get('adults'),
            'children'          =>  session()->get('children'),
            'total_number_room' =>  session()->get('total_number_room'),
            'total_money'       =>  session()->get('total_money'),
            'user_id'           =>  $user->id,
            'name'              =>  $user->name,
            'email'             =>  $user->email,
            'gender'            =>  $user->gender,
            'mobile'            =>  $user->mobile,
            'address'           =>  $user->address,
            'card_type'         =>  $user->card_type,
            'card_number'       =>  $user->card_number,
            'expire'            =>  $user->expire,
            'year'              =>  $user->year
        ]);
    }

    /**
     * [bookings description]
     * @return [type] [description]
     */
    public function bookings($type)
    {
        $user = Auth::user();

        // Nếu type = 1: chuyển từ checkout vào.
        // Nếu type = 2: gọi từ bên ngoài vào.
        if ($type == 1) {
            /*Thêm bản ghi vào bảng room_rental_lists*/

            $array_room = session()->get('array_room');

            for ($i=1; $i <= 10; $i++) { 
                if (session()->get('rt' . $i) > 0) {
                    $room_type_id = $i;

                    $count_room = session()->get('rt' . $i);    //  Số lượng phòng cần đặt của LOẠI PHÒNG đó

                    $count = 0;

                    $rooms = Room::where('room_type_id', $room_type_id)->select('id')->get();

                    for ($j=0; $j < count($array_room); $j++) { 
                        foreach ($rooms as $room) {
                            if ($room->id == $array_room[$j]) {     // Nếu phòng lấy ra trong bảng rooms có trong mảng chứa phòng còn trống
                                if ($count < $count_room) {         // Kiểm tra số lượng phòng cần đặt của loại phòng đó đã đủ chưa
                                    RoomRentalList::create([
                                        'user_id'       =>  $user->id,
                                        'room_id'       =>  $room->id,
                                        'start_date'    =>  date_format(date_create(session()->get('start_date')), 'Y-m-d'),
                                        'end_date'      =>  date_format(date_create(session()->get('end_date')), 'Y-m-d')
                                    ]);

                                    $count++;                       // Mỗi lần insert thì tăng biến đếm bản ghi lên 1

                                    Room::where('id', $room->id)->update(['status' => 1]);
                                }
                            }
                        }
                    }
                }
            }
            /*-------------------------------------------*/

            /*Thêm doanh thu*/
            $revenue = Revenue::where('created_at', date('Y-m-d', time()))->first();

            if ($revenue == null) {
                Revenue::create([
                    'total_amount'  =>  session()->get('total_money'),
                    'created_at'    =>  date('Y-m-d', time())
                ]);
            } else {
                Revenue::where('id', $revenue->id)->update([
                    'total_amount'  =>  session()->get('total_money') + $revenue->total_amount,
                    'updated_at'    =>  date('Y-m-d', time())
                ]);
            }
            /*--------------*/

            /*Thêm vào bảng: Nhật ký đặt phòng của khách hàng*/
            CustomerBookingLog::create([
                'user_id'               =>  $user->id,
                'start_date'            =>  date_format(date_create(session()->get('start_date')), 'Y-m-d'),
                'end_date'              =>  date_format(date_create(session()->get('end_date')), 'Y-m-d'),
                'total_number_people'   =>  session()->get('adults') + session()->get('children'),
                'total_number_room'     =>  session()->get('total_number_room'),
                'total_money'           =>  session()->get('total_money')
            ]);
            /*----------------------------------------------*/

            /*Thêm vào bảng: Chi tiết nhật ký đặt phòng của khách hàng*/
            $customer_booking_log = CustomerBookingLog::where('user_id', $user->id)->orderBy('id', 'desc')->first();

            for ($i=1; $i <= 10; $i++) { 
                if (session()->get('rt' . $i) > 0) {
                    $room_type_id = $i;

                    $count_room = session()->get('rt' . $i);

                    $price = RoomType::find($room_type_id)->price;

                    $total_price = $price * $count_room;

                    CustomerBookingDetail::create([
                        'customer_booking_log_id'   =>  $customer_booking_log->id,
                        'room_type_id'              =>  $room_type_id,
                        'number_room'               =>  $count_room,
                        'total_price'               =>  $total_price
                    ]);
                }
            }
            /*--------------------------------------------------------*/

            $customer_booking_logs = CustomerBookingLog::where('user_id', $user->id)->orderBy('id', 'desc')->get();
        } else {
            $customer_booking_logs = CustomerBookingLog::where('user_id', $user->id)->orderBy('id', 'desc')->get();
        }

        return view('user.booking_log', [
            'customer_booking_logs'     =>  $customer_booking_logs,
            'user_name'                 =>  $user->name
        ]);
    }

    /**
     * [bookingBills description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function bookingBills(Request $request)
    {
        $user = Auth::user();

        $customer_booking_log_id = $request->customer_booking_log_id;

        // $customer_booking_details = CustomerBookingDetail::where('customer_booking_log_id', $customer_booking_log_id)->get();

        $customer_booking_details = DB::table('customer_booking_details')
            ->join('customer_booking_logs', 'customer_booking_details.customer_booking_log_id', '=', 'customer_booking_logs.id')
            ->join('room_types', 'customer_booking_details.room_type_id', '=', 'room_types.id')
            ->where('customer_booking_details.customer_booking_log_id', $customer_booking_log_id)
            ->select([
                'room_types.name',
                'room_types.price',
                'customer_booking_details.number_room',
                'customer_booking_details.total_price',
                'customer_booking_details.total_price',
                'customer_booking_logs.created_at'
                    ])
            ->get();

        return response()->json([
            'error'     =>  false,
            'message'   =>  'Lấy thông tin thành công!',
            'data'      =>  $customer_booking_details,
            'info'      =>  $user
        ]);
    }

}
