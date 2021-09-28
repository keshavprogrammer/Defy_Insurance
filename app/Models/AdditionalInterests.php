<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AdditionalInterests extends Model
{
    protected $table= 'additional_interests';
    
    protected $fillable = [
        'name',
    ];
    
}
