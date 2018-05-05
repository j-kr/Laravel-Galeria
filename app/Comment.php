<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['gallery_id', 'user_id', 'comment', 'rate'];

    public function galleries()
	{
		return $this->hasMany('App\Gallery', 'gallery_id');
	}


	public function users()
	{
    return $this->belongsTo('App\User', 'user_id');
	}
}
