<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageUpload extends Model
{
    use SoftDeletes;

    /**
     * [$table description]
     * @var string
     */
    protected $table="images";

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
        'filename', 'room_type_id'
    ];

    /**
     * Get rooms: One to many
     * @return [type] [description]
     */
    public function room_types() {
        return $this->belongsTo('App\Models\RoomType', 'room_type_id');
    }
}
