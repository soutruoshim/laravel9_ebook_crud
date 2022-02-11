<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::latest()->paginate(5);
        return view('author.index',compact('authors'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'detail' => 'required',
            'photo' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

       
        $imageName = time().'.'.$request->photo->extension();  
        //public folder
        //$request->image->move(public_path('photo'), $imageName);
        //instorage folder
        $request->photo->storeAs('public/images', $imageName);
  
        //Author::create($request->all());
        $author = new Author;
 
        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;
        $author->detail = $request->detail;
        $author->photo = $imageName;
 
        $author->save();
   
        return redirect()->route('authors.index')->with('success','Author created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('author.show',compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('author.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'detail' => 'required',
        ]);
  
        $author->update($request->all());
  
        return redirect()->route('authors.index')->with('success','Author updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
  
        return redirect()->route('authors.index')->with('success','Author deleted successfully');
    }
}
