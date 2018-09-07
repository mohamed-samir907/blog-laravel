<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The Attributes that will be assigned
     * 
     * @var array
     */
    protected $fillable = [
    	'name'
    ];

    /**
     * get the posts for the category
     * one to many relationship
     */
    public function posts()
    {
    	return $this->hasMany('App\Post');
    }
}
