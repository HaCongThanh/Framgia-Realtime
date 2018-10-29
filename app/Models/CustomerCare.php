<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerCare extends Model
{
	use SoftDeletes;

	/**
	 * [$table description]
	 * @var string
	 */
	protected $table = 'customer_cares';

	/**
	 * [$dates description]
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 * [$fillable description]
	 * @var [type]
	 */
	protected $fillable = [
        'user_id', 'carer_id', 'customer_booking_log_id', 'title', 'content', 'type', 'status', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Get users: one to many
     * @return [type] [description]
     */
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * Get customer_booking_logs: one to many
     * @return [type] [description]
     */
    public function customer_booking_logs()
    {
        return $this->belongsTo('App\Models\CustomerBookingLog', 'customer_booking_log_id');
    }

    /**
     * [getCustomerField description]
     * @return [type] [description]
     */
    public static function getCustomerField()
    {
        $customer_field = [
            'name'          =>  'Họ và tên',
            'email'         =>  'Địa chỉ Email',
            'gender'        =>  'Giới tính',
            'birthday'      =>  'Ngày sinh',
            'mobile'        =>  'Số điện thoại',
            'address'       =>  'Địa chỉ',
            'avatar'        =>  'Ảnh đại diện',
            'rate'          =>  'Số điểm đánh giá',
            'review'        =>  'Nhận xét',
            'expire'        =>  'Hạn thẻ',
            'card_type'     =>  'Loại thẻ',
            'card_number'   =>  'Số thẻ',
            'year'          =>  'Năm hết hạn'
        ];

        return $customer_field;
    }

    /**
     * [getCustomerBookingLogField description]
     * @return [type] [description]
     */
    public static function getCustomerBookingLogField()
    {
        $customer_booking_log_field = [
            'start_date'            =>  'Ngày nhận phòng',
            'end_date'              =>  'Ngày trả phòng',
            'total_number_people'   =>  'Tổng số người',
            'total_number_room'     =>  'Tổng số phòng',
            'total_money'           =>  'Tổng tiền',
            'created_at'            =>  'Ngày tạo',
            'note'                  =>  'Ghi chú'
        ];

        return $customer_booking_log_field;
    }

    /**
     * [rereplace_content description]
     * @param  [type] $content              [description]
     * @param  [type] $user                 [description]
     * @param  [type] $customer_booking_log [description]
     * @return [type]                       [description]
     */
    public static function rereplace_content($content, $user, $customer_booking_log)
    {
        $model = new CustomerCare;

        $user_value = $model->getCustomerField();

        $customer_booking_log_value = $model->getCustomerBookingLogField();

        $arr_value = array_merge($user_value, $customer_booking_log_value);

        foreach ($arr_value as $key => $value) {
            $arr[] = $key;
        }
        
        return view('admin.customer_booking_logs.content_email', compact(['content', 'user', 'customer_booking_log', 'arr']));
    }
}
