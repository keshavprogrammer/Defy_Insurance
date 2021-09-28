<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Model
{
    use Notifiable;
    
    protected $guard = 'agent';
    
    protected $fillable = [
        'fname',
        'lname',
        'phone',
        'email',        
        'birth_date',
        'address',        
        'city',
        'state',
        'zip',
        'country',
        'agenc_id', 
        'agent_id',
        'subagent_id',       
    ];
    
    protected $hidden = [        
        'remember_token',
    ];
}
