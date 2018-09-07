<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;

class UsersController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index')
                    ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed',
        ]);

        $name   = filter_var($request->name, FILTER_SANITIZE_STRING);
        $email  = filter_var($request->email, FILTER_SANITIZE_EMAIL);

        $user = User::create([
            'name'      => $name,
            'email'     => $email,
            'password'  => bcrypt($request->password)
        ]);

        $profile = Profile::create([
            'user_id'   => $user->id,
        ]);

        if ($profile) {
            session()->flash('success', 'User Created Successfully!');
        } else {
            session()->flash('error', 'An Error Occured While Adding the User!');
        }

        return redirect()->route('users');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        session()->flash('success', 'User Trashed Successfully!');
        return back();
    }

    /**
     * Get all Trashed Users
     * 
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $users = User::onlyTrashed()->get();

        return view('admin.users.trashed')->with('users', $users);
    }

    /**
     * Force Delete the trashed user
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function force($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        $user->profile->delete();
        $user->forceDelete();
        
        session()->flash('success', 'User Permanently Deleted!');
        return redirect()->route('user.trashed');
    }

    /**
     * Restore the Trashed User
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        $user->restore();

        session()->flash('success', 'User Restored Successfully');
        return back();
    }

    /**
     * Mark the User as Admin
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function admin($id)
    {
        $user = User::find($id);
        $user->admin = 1;
        $user->save();

        session()->flash('success', 'The User Marked as Admin Successfully!');
        return back();
    }

    /**
     * Mark the User as Not Admin
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function notAdmin($id)
    {
        $user = User::find($id);
        $user->admin = 0;
        $user->save();

        session()->flash('success', 'The User Marked as Not Admin Successfully!');
        return back();
    }
}
