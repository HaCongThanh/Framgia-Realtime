<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * [$table description]
     * @var string
     */
    protected $table="categories";

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
    public function posts() {
        return $this->belongsToMany('App\Models\Post', 'category_post', 'category_id', 'post_id');
    }
}
