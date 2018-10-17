<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    /**
     * [$table description]
     * @var string
     */
    protected $table="posts";

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
        'title', 'slug', 'description', 'content', 'image', 'user_id', 'status', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Get categories: Many to many
     * @return [type] [description]
     */
    public function categories() {
        return $this->belongsToMany('App\Models\Category', 'category_post', 'post_id', 'category_id');
    }

    /**
     * Get users: One to many
     * @return [type] [description]
     */
    public function users() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
