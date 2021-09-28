<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Policyplan extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'logo',
        'agenc_id',
        'title',
        'description',
        'published_date',
        'status',        
    ];
}
