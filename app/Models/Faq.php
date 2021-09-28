<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Faq extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'question',
        'description',        
        'status',        
    ];
}
