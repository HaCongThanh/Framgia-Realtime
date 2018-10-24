<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, EntrustUserTrait {
        SoftDeletes::restore insteadof EntrustUserTrait;

        EntrustUserTrait::restore insteadof SoftDeletes;
    }

    /**
     * [$table description]
     * @var string
     */
    protected $table="users";

    /**
     * [$dates description]
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'birthday', 'mobile', 'address', 'avatar', 'rate', 'review', 'arrivals_number', 'total_money_spent', 'type', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * Get roles many to many
     * @return [type] [description]
     */
    public function roles() {
        return $this->belongsToMany('App\Models\Role', 'role_user', 'user_id', 'role_id');
    }

    /**
     * Get room_rental_lists: One to many
     * @return [type] [description]
     */
    public function room_rental_lists() {
        return $this->hasMany('App\Models\RoomRentalList', 'user_id');
    }

    /**
     * Get customer_booking_logs: one to many
     * @return [type] [description]
     */
    public function customer_booking_logs() {
        return $this->hasMany('App\Models\CustomerBookingLog', 'user_id');
    }

    /**
     * Get posts: One to many
     * @return [type] [description]
     */
    public function posts() {
        return $this->hasMany('App\Models\Post', 'user_id');
    }

    /**
     * Get Comments: One to many
     * @return [type] [description]
     */
    public function comments() {
        return $this->hasMany('App\Models\Comment', 'user_id');
    }
}