<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Policytype extends Model
{
    use Notifiable;
    
    protected $fillable = [        
        'policy_type_title',        
        'status',        
    ];
}
