<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class InsuredInformationCl extends Model
{
    protected $table= 'insured_information_cl';
    
    protected $fillable = [
        'name',
    ];
    
}
