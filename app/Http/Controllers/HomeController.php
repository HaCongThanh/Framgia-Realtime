<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomRentalList;
use App\Models\User;

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

        if ($end_date <= $min_date || $start_date >= $max_date) {
            // Nếu (ngày nhận phòng của khách) nhỏ hơn (ngày nhận phòng nhỏ nhất) HOẶC (ngày trả phòng của khách) lớn hơn (ngày trả phòng lớn nhất): thì tất cả các phòng đều CÒN TRỐNG vào khoảng thời gian thuê đó.
            dd('Tất cả các phòng đều còn trống vào khoảng thời gian bạn chọn.');
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

            // dd($array_count);
            // dd($array_time);

            for ($i=0; $i < count($array_time); $i++) {
                $room_id = $array_time[$i]['room_id'];

                /*Nếu phòng đó mới chỉ tồn tại 1 bản ghi*/
                if ($array_count[$room_id] == 1) {
                    /*Nếu (ngày trả phòng của khách) nhỏ hơn (ngày nhận phòng của khách trước đã thuê) HOẶC (ngày nhận phòng của khách) lớn hơn (ngày trả phòng của khách trước đã thuê)*/
                    if ($end_date <= $array_time[$i]['start_date'] || $start_date >= $array_time[$i]['end_date']) {
                        array_push($array_room, $room_id);  // Đẩy ID phòng vào mảng
                    }
                } else {
                    /*Trong mảng này tồn tại nhiều bản ghi, vì thế phải kiểm tra xem bản ghi tiếp theo có phải cùng phòng đó ko*/
                    if ($array_time[$i]['room_id'] == $array_time[$i+1]['room_id']) {
                        /*Nếu (ngày trả phòng của khách A) nhỏ hơn (ngày nhận phòng của khách này) VÀ (ngày trả phòng của khách này) nhỏ hơn (ngày nhận phòng của khách B)*/
                        if ($array_time[$i]['end_date'] <= $start_date && $end_date <= $array_time[$i+1]['start_date']) {
                            array_push($array_room, $room_id);  // Đẩy ID phòng vào mảng
                        }
                    }
                }
            }

            $array_room = array_unique($array_room);
            dd($array_room);
        }

        



        // dd(RoomRentalList::orderBy('room_id', 'desc')->first());

        // dd($start_date1);

        // $data = $request->all();

        // if ($data['adults'] == 'Người lớn') {
        //     $data['adults'] = 0;
        // }

        // if ($data['children'] == 'Trẻ em') {
        //     $data['children'] = 0;
        // }

        

        // $keyWord =  $request->Input('q');
        // $posts = Post::SearchByKeyword($keyWord)->orderBy('created_at', 'desc')->paginate(6);
        // $courses = Course::search($keyWord);

        // $posts->setPath('?q='.$keyWord);
        // $courses->setPath('?q='.$keyWord);

        return true;
    }

}
