<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Blog extends Model
{
    protected $fillable = [
        'cate_id',
        'blog_title',
        'blog_image',
        'description',
        'tags',
        'is_publish',
        'status',                
    ];
    
    
}
