<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomRentalList extends Model
{
    use SoftDeletes;

    /**
     * [$table description]
     * @var string
     */
    protected $table="room_rental_lists";

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
        'user_id', 'room_id', 'start_date', 'end_date'
    ];

    /**
     * Get users: One to many
     * @return [type] [description]
     */
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * Get rooms: One to many
     * @return [type] [description]
     */
    public function rooms()
    {
        return $this->belongsTo('App\Models\Room', 'room_id');
    }

}
