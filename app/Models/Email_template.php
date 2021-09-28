<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email_template extends Model
{
    protected $fillable = [
        'name',
        'is_active',             
    ];
}
