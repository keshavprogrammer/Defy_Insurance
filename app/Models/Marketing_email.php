<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marketing_email extends Model
{
    protected $fillable = [
    	'agency_id',
    	'creater_id',
    	'user_id',
        'usertype',
    	'template_id',
    	'subject',
    	'description',
    	'is_sent',
    	'is_active'
    ];

    public function template_nm() {
        return $this->belongsTo('App\Models\Email_template', 'template_id', 'id');
    }

    public function lead_nm() {
        return $this->belongsTo('App\Models\Lead', 'user_id', 'id');
    }
}
