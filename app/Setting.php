<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The Attributes that will be assigned
     * 
     * @var array
     */
    protected $fillable = [
    	'site_name', 'contact_number', 'contact_email', 'address'
    ];
}
