<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tags.index')->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'tag' => 'bail|required|string|max:100'
        ]);

        $tag = filter_var($request->tag, FILTER_SANITIZE_STRING);

        $tag = Tag::create([
            'tag' => $tag
        ]);

        if ($tag) {
            session()->flash('success', 'Tag Added Successfully!');
            return back();
        }

        session()->flash('success', 'An Error Occurred While Adding the Tag!');
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
        $tag = Tag::find($id);

        return view('admin.tags.edit')->with('tag', $tag);
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
        $oldTag = Tag::find($id);

        $this->validate($request, [
            'tag' => 'bail|required|string|max:100'
        ]);

        $tag = filter_var($request->tag, FILTER_SANITIZE_STRING);

        $oldTag->tag = $tag;
        if ($oldTag->save()) {
            session()->flash('success', 'Tag Updated Successfully!');
            return redirect()->route('tags');
        }

        session()->flash('success', 'An Error Occurred While Updating the Tag!');
        return redirect()->route('tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        session()->flash('success', 'Tag Deleted Successfully!');
        return back();
    }
}
