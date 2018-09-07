<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	/**
	 * The Attributes that will be assigned
	 * 
	 * @var array
	 */
	protected $fillable = [
		'tag'
	];
	
    /**
     * get the posts for the tag
     * many to many relation ship
     */
    public function posts()
    {
    	return $this->belongsToMany('App\Post');
    }
}
