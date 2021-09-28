<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Department extends Model
{
    protected $table= 'departments';
    
    protected $fillable = [
        'name',
    ];
    
}
