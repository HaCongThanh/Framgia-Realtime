<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Revenue;
use App\Models\CustomerBookingLog;
use App\Models\Post;

class HomeController extends Controller
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
        return view('admin.dashboard');
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
     * [dashboardStatistical description]
     * @return [type] [description]
     */
    public function dashboardStatistical()
    {
        /*Tổng doanh thu*/
        $revenues = Revenue::select('total_amount')->get();

        $total_revenue = $revenues->sum('total_amount');
        /*--------------*/

        /*Tổng lượt đặt phòng*/
        $count_customer_booking_logs = CustomerBookingLog::count();
        /*-------------------*/

        /*Tổng bài viết*/
        $count_posts = Post::count();
        /*-------------*/

        /*Tổng số khách đến*/
        $customer_booking_logs = CustomerBookingLog::select('total_number_people')->get();

        $total_number_people = $customer_booking_logs->sum('total_number_people');
        /*-----------------*/

        return response()->json([
            'error'                         =>  false,
            'message'                       =>  'Lấy thông tin thống kê thành công!',
            'total_revenue'                 =>  $total_revenue,
            'count_customer_booking_logs'   =>  $count_customer_booking_logs,
            'count_posts'                   =>  $count_posts,
            'total_number_people'           =>  $total_number_people
        ]);
    }

    /**
     * [dashboardNotification description]
     * @return [type] [description]
     */
    public function dashboardNotification()
    {
        $array_note = array();

        $customer_booking_logs = CustomerBookingLog::where('note', '!=', null)->get();

        foreach ($customer_booking_logs as $customer_booking_log) {
            array_push($array_note, [
                'note'                      =>  $customer_booking_log->note,
                'name'                      =>  $customer_booking_log->users->name,
                'customer_booking_log_id'   =>  $customer_booking_log->id,
                'avatar'                    =>  $customer_booking_log->users->avatar
            ]);
        }

        return response()->json([
            'error'     =>  false,
            'message'   =>  'Lấy thông tin thống kê thành công!',
            'data'      =>  $array_note
        ]);
    }
}
