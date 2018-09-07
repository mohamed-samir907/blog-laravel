<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategroiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::orderBy('id', 'desc')->get();

        return view('admin.categories.index')->with('cats', $cats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|filled|string|max:255'
        ], [], [
            'name' => 'Category Name'
        ]);
        
        $name = filter_var($data['name'], FILTER_SANITIZE_STRING);
        
        Category::create([
            'name' => $name
        ]);
        session()->flash('success', 'Category Created Successfuly!');
        return redirect()->route('categories');
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
        $cat = Category::find($id);

        return view('admin.categories.edit')->with('cat', $cat);
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
        $request->name = filter_var($request->name, FILTER_SANITIZE_STRING);

        $data = $this->validate($request, [
            'name' => 'required|string|min:6|max:255'
        ]);        

        $cat = Category::find($id);
        $cat->name = $data['name'];
        $cat->save();

        session()->flash('success', 'Category Updated Successfuly!');
        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        foreach ($cat->posts as $post) {
            $post->forceDelete();
        }
        $cat->delete();

        session()->flash('success', 'Category Deleted Successfuly!');
        return redirect()->route('categories');
    }
}
