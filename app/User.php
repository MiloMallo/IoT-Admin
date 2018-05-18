<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;
//admin_users
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['abbreviation','username', 'password', 'mobile','phone','address', 'avatar','sex','QQ','email'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
