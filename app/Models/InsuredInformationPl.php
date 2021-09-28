<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class InsuredInformationPl extends Model
{
    protected $table= 'insured_information_pl';
    
    protected $fillable = [
        'name',
    ];
    
}
