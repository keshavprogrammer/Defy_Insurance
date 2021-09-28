<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sms_historie extends Model
{
    protected $fillable = [        
        'sender_id',        
        'receiver_id',        
        'sender_type',        
        'receiver_type',        
        'sms_type',        
        'sms_content',        
    ];
}
