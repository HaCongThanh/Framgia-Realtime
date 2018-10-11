<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;

    /**
     * [$table description]
     * @var string
     */
    protected $table="rooms";

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
        'room_type_id', 'floor'
    ];

    /**
     * Get room_rental_lists: One to many
     * @return [type] [description]
     */
    public function room_rental_lists() {
        return $this->hasMany('App\Models\RoomRentalList', 'room_id');
    }

    /**
     * Get room_types: One to many
     * @return [type] [description]
     */
    public function room_types()
    {
        return $this->belongsTo('App\Models\RoomType', 'room_type_id');
    }
}
