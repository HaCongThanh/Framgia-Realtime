<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    /**
     * [$table description]
     * @var string
     */
    protected $table = "comments";

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
        'post_id', 'user_id', 'comment', 'name', 'parent_id', 'updated_at', 'deleted_at', 'created_at'
    ];

    /**
     * Get posts: One to many
     * @return [type] [description]
     */
    public function posts() {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }

    /**
     * Get users: One to many
     * @return [type] [description]
     */
    public function users() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
