<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client_policyplan extends Model
{
    use Notifiable;
    
    protected $guard = 'agent';
    
    protected $fillable = [
        'client_id',
        'policy_type_id',
        'policy_id',
        'premium_price',        
        'start_date',
        'next_premium_date',        
        'holder_name',
        'holder_id_proof_photo',
        'holder_birth_date',
        'vehicle_photo',
        'vehicle_no',
        'vehicle_engine_no',
        'property_address',
        'property_photo',
        'property_document_photo',        
        'agenc_id',
        'agent_id',        
    ];
    
    protected $hidden = [        
        'remember_token',
    ];
    
    public function policytype_name() {
        return $this->belongsTo('App\Models\Policytype', 'policy_type_id', 'id');
    }
    
    public function policyplan_name() {
        return $this->belongsTo('App\Models\Policyplan', 'policy_id', 'id');
    }
    
}
