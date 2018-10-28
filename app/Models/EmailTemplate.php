<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailTemplate extends Model
{
	use SoftDeletes;

	/**
	 * [$table description]
	 * @var string
	 */
	protected $table= 'email_templates';

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
        'name', 'title', 'content', 'created_at', 'updated_at', 'deleted_at'
    ];
}
