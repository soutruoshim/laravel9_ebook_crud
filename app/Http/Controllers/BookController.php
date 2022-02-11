<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->paginate(5);
        return view('book.index',compact('books'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
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
            
        ]);

    
        $book = new Book;
 
        $book->author_id = $request->author_id;
        $book->title = $request->title;
        
        $book->ISBN = $request->ISBN;
        $book->genre = $request->genre;
        
        $book->category_id = $request->category_id;
        $book->publication_year = $request->publication_year;

        $book->price = $request->price;
        $book->detail = $request->detail;;

        $imageName = time().'.'.$request->image->extension();  
        $request->image->storeAs('public/images', $imageName);
        $book->image = $imageName;

        $fileName = time().'.'.$request->book_file->extension();  
        $request->book_file->storeAs('public/book_files', $fileName);
        $book->book_file = $fileName;

        $book->save();
   
        return redirect()->route('books.index')->with('success','Book created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
