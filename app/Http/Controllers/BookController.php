<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Author;
use App\Models\Book;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::get();

        return view('admin.books', ['books' => $books]);
    }

    /**
     * Display a listing of the resource for user.
     */
    public function userIndex()
    {
        $books= Book::get();
        return view('admin.books',['books' => $books]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors    = Author::get();


        return view('admin.forms.book.create', [
            'authors' => $authors,

         ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {


        $pic = time() . '-' . $request->title . '.' . $request->cover->extension();
        $request->cover->move('storage/images/book_images',$pic);

        $book = Book::create([
            'title'       => $request->title,
            'describtion' => $request->describtion,
            'author_id' => $request->author_id,
            'cover' => $pic,
        ]);


        return redirect(route('books'))->with('message', 'Book Added');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $book = Book::findOrFail($id);


        return view('book', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $authors        = Author::get();

        $book           = Book::where('id', $id)->first();


        return view('admin.forms.book.update', $book, compact('authors', ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBookRequest $request, string $id)
    {


        $book = Book::find($id);

        $pic = time() . '-' . $request->title . '.' . $request->cover->extension();
        $request->cover->move('storage/images/book_images',$pic);

        $book->update([
            'title'       => $request->title,
            'describtion' => $request->describtion,
            'author_id'   => $request->author_id,
            'cover'       => $pic,
        ]);



        return redirect(route('books'))->with('message','Book Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::where('id', $id)->delete();
        return redirect(route('books'))->with('message','Book deleted');
    }
}
