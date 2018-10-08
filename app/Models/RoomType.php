<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomType extends Model
{
    use SoftDeletes;

    /**
     * [$table description]
     * @var string
     */
    protected $table="room_types";

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
        'name', 'room_size', 'bed', 'max_people', 'price', 'image', 'description', 'facilities'
    ];

    /**
     * Get rooms: One to many
     * @return [type] [description]
     */
    public function rooms() {
        return $this->hasMany('App\Models\Room', 'room_type_id');
    }

}
