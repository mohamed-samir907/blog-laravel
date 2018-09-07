<?php

namespace App\Http\Controllers;

use File;
use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        
        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        $tags = Tag::all();

        if ($cats->count() == 0) {
            session()->flash('info', 'Please add some categories before adding the post!');
            return redirect()->route('category.create');
        }

        if ($tags->count() == 0) {
            session()->flash('info', 'Please add some tags before adding the post!');
            return redirect()->route('tag.create');
        }

        return view('admin.posts.create')->with('cats', $cats)
                                        ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # Validate the data
        $valid = $this->validate($request, [
            'title'         => 'bail|required|min:6|max:255|string',
            'file'          => 'bail|required|image|mimes:jpg,jpeg,png|max:5000',
            'category_id'   => 'bail|required|exists:categories,id|integer',
            'content'       => 'bail|required',
            'tags'          => 'bail|required'
        ], [], [
            'title'         => 'Title',
            'file'          => 'Featured Image',
            'category_id'   => 'Category',
            'content'       => 'Content',
            'tags'          => 'Tags'
        ]);

        # Sanitize the data
        $title      = filter_var($request->title, FILTER_SANITIZE_STRING);
        $content    = htmlentities($request->content, ENT_QUOTES, "UTF-8");

        $newName = $this->uploadImage($request->file, 'uploads/img');
        if ($newName != 'error') {
            
            $try = 0;

            label:
            $post = Post::create([
                'title'         => $title,
                'slug'          => str_slug($title),
                'featured'      => 'uploads/img/' . $newName,
                'content'       => $content,
                'category_id'   => $valid['category_id'],
                'user_id'       => auth()->user()->id
            ]);
            # Add Tags to post_tag Table
            $post->tags()->attach($request->tags);

            $cat = $post->category;
            $cat->posts_count++;
            $cat->save();

            if ($post) {
                session()->flash('success','Post Added Successfuly!');
            } else {
                if ($try == 0) {
                    goto label;
                    $try++;
                } else {
                    session()->flash('error', 'An Error Occured While Adding the post!');
                }
            }

        } else {
            session()->flash('error','An Error Occured While Adding the post!');
        }

        return back();
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
        $post = Post::find($id);
        $cats = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit')
                    ->with('post', $post)
                    ->with('cats', $cats)
                    ->with('tags', $tags);
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
        $post = Post::find($id);
        
        # Check if the input file is null
        if ($request->file != null) {
            $file = 'bail|required|image|mimes:jpg,jpeg,png|max:5000';
            # Validate the Data
            $valid = $this->validate($request, [
                'title'         => 'bail|required|string|min:6|max:255',
                'file'          => 'bail|required|image|mimes:jpg,jpeg,png|max:5000',
                'category_id'   => 'bail|required|exists:categories,id|integer',
                'content'       => 'bail|required',
                'tags'          => 'bail|required'
            ], [], [
                'title'         => 'Title',
                'file'          => 'Featured Image',
                'category_id'   => 'Category',
                'content'       => 'Content',
                'tags'          => 'Tags'
            ]);
        } else {
            # Validate the Data
            $valid = $this->validate($request, [
                'title'         => 'bail|required|string|min:6|max:255',
                'category_id'   => 'bail|required|exists:categories,id|integer',
                'content'       => 'bail|required',
                'tags'          => 'bail|required'
            ], [], [
                'title'         => 'Title',
                'category_id'   => 'Category',
                'content'       => 'Content',
                'tags'          => 'Tags'
            ]);
        }
        
        # Sanitize the Data
        $title = filter_var($request->title, FILTER_SANITIZE_STRING);
        $content = htmlentities($request->content);

        # Upload New Image and Remove Old Image
        if ($request->file != null) {

            $newName = $this->uploadImage($request->file, 'uploads/img', true, $post->featured);

            if ($newName != 'error') {
                $post->featured = 'uploads/img/' . $newName;
            } else {
                session()->flash('error', 'An Error Occured While Updating the Post!');
                return redirect()->route('posts');
            }
        }
        $post->title = $title;
        $post->content = $content;
        $post->category_id = $request->category_id;
        $post->slug = str_slug($title);
        $post->save();

        # Update the Tags
        $post->tags()->sync($request->tags);

        session()->flash('success', 'Post Updated Successfully!');
        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        session()->flash('success', 'The Post was Trashed!');
        return back();
    }

    /**
     * Get all trashed posts
     * 
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts', $posts);
    }

    /**
     * Delete the trashed post
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function force($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        
        File::delete($post->featured);
        
        $cat = $post->category;
        $cat->posts_count--;
        $cat->save();

        $post->forceDelete();

        session()->flash('success', 'The Post Permanently Deleted!');
        return redirect()->route('post.trashed');
    }

    /**
     * Restore the post from the trashed
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        session()->flash('success', 'The Post Restored Successfuly');
        return redirect()->route('posts');
    }
}