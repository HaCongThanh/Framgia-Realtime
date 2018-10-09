<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomRentalList;
use App\Models\User;
use App\Models\Room;
use App\Models\RoomType;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
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
            $adults = 0;
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
            }
            /*---------------------------------------------------------*/

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

        return view('booking', [
            'array_room_type_data'      =>  $array_room_type_data,
            'array_count_room_type'     =>  $array_count_room_type,
            'start_date'                =>  $request->input('start_date'),
            'end_date'                  =>  $request->input('end_date')
        ]);
    }



}
