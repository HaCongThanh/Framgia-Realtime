<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerBookingLog extends Model
{
	use SoftDeletes;

	/**
	 * [$table description]
	 * @var string
	 */
	protected $table="customer_booking_logs";

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
        'user_id', 'start_date', 'end_date', 'total_number_people', 'total_number_room', 'total_money', 'note', 'seen', 'created_at', 'updated_at', 'deleted_at'
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
     * Get customer_booking_details: one to many
     * @return [type] [description]
     */
    public function customer_booking_details() {
        return $this->hasMany('App\Models\CustomerBookingDetail', 'customer_booking_log_id');
    }
}
