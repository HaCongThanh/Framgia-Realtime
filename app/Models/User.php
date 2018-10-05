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
        'name', 'email', 'password', 'gender', 'birthday', 'mobile', 'address', 'avatar', 'rate', 'review', 'arrivals_number', 'total_money_spent', 'type',
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
}