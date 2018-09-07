<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display the Main Blog Page
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting    = Setting::first();
    	$first_post	= Post::orderBy('created_at', 'desc')->first();
    	$second_post= Post::orderBy('created_at', 'desc')->skip(1)->take(1)->first();
    	$third_post	= Post::orderBy('created_at', 'desc')->skip(2)->take(1)->first();
    	$cats 		= Category::take(7)->get();
        $laravel    = Category::orderBy('posts_count', 'desc')->take(3)->get();

        // dd($laravel);

        /*$php        = Category::where('posts_count', 'PHP')->first();
        $web_design = Category::where('posts_count', 'Web Design')->first();*/

    	return view('index', [
    		'setting' 		=> $setting,
    		'cats'			=> $cats,
    		'first_post'	=> $first_post,
    		'second_post'	=> $second_post,
    		'third_post'	=> $third_post,
            'laravel'       => $laravel,
            /*'php'           => $php,
            'web_design'    => $web_design*/
        ]);
    }

    /**
     * Display The Post
     * 
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function singlePost($slug)
    {
        $setting    = Setting::first();
        $cats       = Category::take(7)->get();

        $post = Post::where('slug', $slug)->get()->first();
        
        if ($post) {
            $post->viewed++;
            $post->save();
        }

        $next_id = Post::where('id', '>', $post->id)->min('id');
        $prev_id = Post::where('id', '<', $post->id)->max('id');

        return view('front.post.single', [
            'setting'       => $setting,
            'cats'          => $cats,
            'post'          => $post,
            'next_post'     => Post::find($next_id),
            'prev_post'     => Post::find($prev_id),
            'tags'          => Tag::all()
        ]);
    }

    /**
     * Disply the category posts
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function singleCategory($id)
    {
        $setting    = Setting::first();
        $cats       = Category::take(7)->get();
        $category   = Category::find($id);

        return view('front.category.single', [
            'setting'       => $setting,
            'cats'          => $cats,
            'category'      => $category
        ]);
    }

    /**
     * Disply the tag posts
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function singleTag($id)
    {
        $setting    = Setting::first();
        $cats       = Category::take(7)->get();
        $tag        = Tag::find($id);

        return view('front.tag.single', [
            'setting'       => $setting,
            'cats'          => $cats,
            'tag'           => $tag
        ]);
    }

    /**
     * Search on query
     * 
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $posts = Post::where('title', 'like', '%' . request('query') . '%')->get();

        $setting    = Setting::first();
        $cats       = Category::take(7)->get();

        return view('search', [
            'setting'       => $setting,
            'cats'          => $cats,
            'posts'         => $posts,
            'title'         => request('query')
        ]);
    }

    /**
     * Subscribe visitor on the blog
     * 
     * @return \Illuminate\Http\Response
     */
    public function subscribe()
    {
        
    }
}
