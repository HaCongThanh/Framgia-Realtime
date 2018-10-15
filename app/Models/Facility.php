<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    use SoftDeletes;

    /**
     * [$table description]
     * @var string
     */
    protected $table="facilities";

    /**
     * [$dates description]
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * [$fillable description]
     * @var [type]
     */
    protected $guarded = ['id'];

    /**
     * Get categories: Many to many
     * @return [type] [description]
     */
    public function room_types() {
        return $this->belongsToMany('App\Models\RoomType', 'facility_room_type', 'facility_id', 'room_type_id');
    }
}
