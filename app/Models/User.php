<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guard = 'user';

    protected $fillable = [
        'fname',
        'lname',
        'phone',
        'email',
        'password',
        'address_street',
        'address_apt',
        'city',
        'state',
        'zip',
        'hear_about'
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];
}
