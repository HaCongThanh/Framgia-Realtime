<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerBookingDetail extends Model
{
	use SoftDeletes;

	/**
	 * [$table description]
	 * @var string
	 */
	protected $table="customer_booking_details";

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
        'customer_booking_log_id', 'room_type_id', 'number_room', 'total_price', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Get customer_booking_logs: one to many
     * @return [type] [description]
     */
    public function customer_booking_logs()
    {
        return $this->belongsTo('App\Models\CustomerBookingLog', 'customer_booking_log_id');
    }

    /**
     * Get room_types: one to many
     * @return [type] [description]
     */
    public function room_types()
    {
        return $this->belongsTo('App\Models\RoomType', 'room_type_id');
    }
}
