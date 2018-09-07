<?php

namespace App\Http\Controllers;

use App\Tag;
use App\User;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts          = Post::all();
        $trashedPosts   = Post::onlyTrashed()->get();
        $users          = User::all();
        $trashedUsers   = User::onlyTrashed()->get();
        $categories     = Category::all();
        $tags           = Tag::all();

        return view('home')
                ->with('posts', $posts)
                ->with('trashedPosts', $trashedPosts)
                ->with('users', $users)
                ->with('trashedUsers', $trashedUsers)
                ->with('cats', $categories)
                ->with('tags', $tags);
    }
}
