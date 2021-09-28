<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RatingState extends Model
{
    protected $table= 'rating_state';
    
    protected $fillable = [
        'name',
    ];
    
}
