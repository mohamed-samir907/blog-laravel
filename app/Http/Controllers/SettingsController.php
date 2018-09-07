<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
	/**
	 * Constructor
	 * 
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('admin');
	}

    /**
     * Display settings page
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$settings = Setting::first();

    	return view('admin.settings.edit')->with('settings', $settings);
    }

    /**
     * Update Blog Settings
     * 
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
    	$this->validate(request(), [
    		'site_name' 	  => 'bail|required|string|max:150',
            'contact_email'   => 'bail|required|email',
    		'contact_status'  => 'bail|required|string',
            'contact_number'  => 'bail|required|numeric',
    		'contact_time'    => 'bail|required|string',
            'address'         => 'bail|required|string',
            'address_info'    => 'bail|required|string',
    		'site_info'	      => 'bail|required|string'
    	]);

        $sett = Setting::first();

        $sett->site_name        = filter_var(request()->site_name, FILTER_SANITIZE_STRING);
        $sett->contact_email    = request()->contact_email;
        $sett->contact_status   = filter_var(request()->contact_status, FILTER_SANITIZE_STRING);
        $sett->contact_number   = request()->contact_number;
        $sett->contact_time     = request()->contact_time;
        $sett->address          = filter_var(request()->address, FILTER_SANITIZE_STRING);
        $sett->address_info     = filter_var(request()->address_info, FILTER_SANITIZE_STRING);
        $sett->site_info        = filter_var(request()->site_info,FILTER_SANITIZE_STRING);
        $sett->save();

        session()->flash('success', 'Settings Updated Successfully!');
        return back();
    }
}
