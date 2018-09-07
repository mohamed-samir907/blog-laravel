<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	/** 
	 * The Attribute that will be assigned
	 * 
	 * @var array
	 */
	protected $fillable = [
		'user_id', 'avatar', 'about', 'facebook', 'youtube'
	];

    /**
     * Get the user for the profile
     * one to one relationship
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
