<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Profile;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $trashed = User::withTrashed()->where('id', $id)
                                    ->get()->first();
        if ($trashed->deleted_at != null) {
            session()->flash('info', 'This Profile Not Found');
            return redirect()->route('home');
        }

        $user = User::find($id);

        return view('admin.users.profile')->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->id != $id)
            return redirect()->route('home');

        $user = User::find($id);

        return view('admin.users.edit_profile')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'about'     => 'bail|required|string',
            'name'      => 'bail|required|string|max:255',
            'email'     => 'bail|required|string|email|max:255',
            'mobile'    => 'bail|required|string',
            'occupation'=> 'bail|required|string',
            'facebook'  => 'bail|required|url',
            'linkedin'  => 'bail|required|url'
        ]);

        $name       = filter_var($request->name, FILTER_SANITIZE_STRING);
        $about      = filter_var($request->about, FILTER_SANITIZE_STRING);
        $email      = filter_var($request->email, FILTER_SANITIZE_EMAIL);
        $occupation = filter_var($request->occupation, FILTER_SANITIZE_STRING);
        $mobile     = preg_match('/^(\(20\) [0-9]+)$/', $request->mobile) ? $request->mobile: 'empty';
        $facebook   = filter_var($request->facebook, FILTER_SANITIZE_URL);
        $linkedin   = filter_var($request->linkedin, FILTER_SANITIZE_URL);

        $user = User::find($id);
        
        $user->name                 = $name;
        $user->email                = $email;
        $user->profile->about       = $about;
        $user->profile->occupation  = $occupation;
        $user->profile->mobile      = $mobile;
        $user->profile->facebook    = $facebook;
        $user->profile->linkedin    = $linkedin;
        $user->save();
        $user->profile->save();

        session()->flash('success', 'Profile Updated Successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Update User Avatar
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function avatar(Request $request, $id)
    {
        $profile = Profile::where('user_id', $id)->get()->first();

        $valid = $this->validate($request, [
            'avatar' => 'bail|required|image|mimes:jpg,jpeg,png|max:5000',
        ]);

        $image = $request->file('avatar');
        $newName = $this->uploadImage($image, 'uploads/avatars', true, $profile->avatar);
        
        if ($newName != 'error') {
            $profile->avatar = 'uploads/avatars/' . $newName;
            $profile->save();

            session()->flash('success', 'Image Changed Successfully');
        } else {
            session()->flash('error', 'An Error Occured While Change the Image');
        }

        return back();
    }

    /**
     * Update User Password
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request, $id)
    {
        
        $this->validate($request, [
            'oldPassword'       => 'bail|required|string',
            'password'          => 'bail|required|string|min:6',
            'password_confirm'  => 'bail|required|string|min:6'
        ]);

        $password   = $request->password;
        $confirm    = $request->password_confirm;
        $old        = $request->oldPassword;

        if ($password !== $confirm) {
            session()->flash('error', 'Please Enter New Password Correctly in Two Fields!');
            return back();
        }
        
        $user = User::find($id);
        
        $hasher = app('hash');

        if (!$hasher->check($old, $user->password)) {
            session()->flash('error', 'Please Enter Current Password Correctly!');
            return back();
        }

        $user->password = bcrypt($password);
        $user->save();

        session()->flash('success', 'Password Changed Successfully!');
        return back();
    }
}
