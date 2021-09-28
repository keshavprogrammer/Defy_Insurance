<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class LeadSource extends Model
{
    protected $table= 'lead_source';
    
    protected $fillable = [
        'name',
    ];
    
}
