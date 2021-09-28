<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staticpage extends Model
{
    protected $fillable = [
		'page_title',
		'short_description',
		'description',
		'picture'
	];
}
