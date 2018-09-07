<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
        	'site_name' 	    => 'Mohamed Blog',
            'site_info'         => 'About Our Site text goes here',
        	'address'		    => 'Matay, Minia, Egypt',
        	'contact_number'	=> '(20) 01026687240',
        	'contact_email'		=> 'info@mohamed-blog.com',
            'contact_time'      => 'Sat - Fri 10am - 11pm',
            'contact_status'    => 'online support',
            'address_info'      => 'Soliman El halaby ST'
        ]);
    }
}
