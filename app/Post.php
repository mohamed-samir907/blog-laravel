<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;

	/**
	 * The columns that will be assigned
	 * 
	 * @var array
	 */
	protected $fillable = [
		'title', 'category_id', 'featured', 'content', 'slug', 'user_id'
	];
    
    /**
     * @var array
     */
    protected $dates = [
    	'deleted_at'
    ];

    /**
     * get the category for the post
     * one to many relationship
     */
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    /**
     * get the tags for the post
     * many to many relationship
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * Get the user for the post
     * one to many relationship
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
