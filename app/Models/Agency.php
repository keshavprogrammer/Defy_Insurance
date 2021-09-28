<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Agency extends Authenticatable
{
    //
    use Notifiable;
    
    protected $guard = 'agency';
    
    protected $fillable = [
        'logo',
        'name',
        'email',
        'password',
        'phone',
        'address',        
        'city',
        'state',
        'zip',
        'country',
        'contact_name',
        'contact_email',
        'contact_phone',
        'theme_id',
        'status',
    ];
    
    protected $hidden = [
        'password', 
        'remember_token',
    ];
}
