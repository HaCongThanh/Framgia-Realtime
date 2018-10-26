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
	protected $table = "customer_cares";

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
}
