<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
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
        'room_type_id', 'filename', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Get room_types: One to many
     * @return [type] [description]
     */
    public function room_types() {
        return $this->belongsTo('App\Models\RoomType', 'room_type_id');
    }
}
