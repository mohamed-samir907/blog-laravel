<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
        	'name'     => 'Mohamed Samir',
        	'email'    => 'gm.mohamedsamir@gmail.com',
        	'password' => bcrypt(123456),
            'admin'    => 1
        ]);

        App\Profile::create([
            'user_id'   => $user->id,
            'avatar'    => '',
            'mobile'    => '(20) 01026687240',
            'occupation'=> 'PHP Developer',
            'about'     => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            'facebook'  => 'https://www.facebook.com/mohamed.samir907',
            'linkedin'  => 'https://www.linkedin.com/in/mohamed-samir907'
        ]);
    }
}
