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
        'name', 'room_size', 'bed', 'max_people', 'price', 'description'
    ];

    /**
     * Get rooms: One to many
     * @return [type] [description]
     */
    public function rooms() {
        return $this->hasMany('App\Models\Room', 'room_type_id');
    }

    /**
     * Get rooms: Many to many
     * @return [type] [description]
     */
    public function facilities(){
        return $this->belongsToMany('App\Models\Facility', 'facility_room_type', 'room_type_id', 'facility_id');

    }

    /**
     * Get rooms: One to many
     * @return [type] [description]
     */
    public function images() {
        return $this->hasMany('App\ImageUpload', 'room_type_id');
    }
}
