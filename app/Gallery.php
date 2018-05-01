<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $table = 'gallery';

	public function images()
	{
		return $this->hasMany('App\Image');
	}


	public function users()
	{
    return $this->belongsTo('App\User', 'created_by');
	}

}