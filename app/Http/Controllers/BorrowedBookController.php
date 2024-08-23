<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBorrowedBookRequest;
use App\Http\Requests\UpdateBorrowedBookRequest;
use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\User;

class BorrowedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = BorrowedBook::orderBy('created_at', 'DESC')->get();
        $books = $books->sortBy('returned');

        return view('admin.borrowed-books', [ 'books' => $books ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        $books = Book::orderBy('title')->where('available', true)->get();

        return view('admin.forms.borrowed-book.create', [
            'users' => $users,
            'books' => $books,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBorrowedBookRequest $request)
    {
        BorrowedBook::create([
            'user_id'     => $request->user_id,
            'book_id'     => $request->book_id,
            'return_date' => $request->return_date,
        ]);

        return redirect(route('borrowed-books.index'))->with('message', 'Book Borrowed');
    }

    /**
     * Store a book in the borrowed list
     *
     * @param string $book Book id
     */
    public function userStore(string $book)
    {
        $now    = new \DateTime();
        $userId = auth()->id();

        $returnDate = $now->modify('+14 days')->format('Y-m-d');

        BorrowedBook::create([
            'user_id'     => $userId,
            'book_id'     => $book,
            'return_date' => $returnDate,
        ]);

        Book::where('id', $book)->update([
            'available' => false
        ]);

        return redirect()->back()->with('message', "Book Borrowed");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $borrowed = BorrowedBook::where('id', $id)->first();
        $users    = User::get();
        $books    = Book::orderBy('title')->where('available', true)->get();

        return view('admin.forms.borrowed-book.update', compact('borrowed', 'users', 'books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBorrowedBookRequest $request, string $id)
    {
        BorrowedBook::where('id', $id)->update([
            'return_date' => $request->return_date,
        ]);

        return redirect(route('borrowed-books.index'))->with('message', 'Borrow Updated');
    }

    /**
     * Mark a borrowed book as returned
     *
     * @param string $id Borrowal id
     */
    public function return(string $id)
    {
        $borrowed = BorrowedBook::findOrFail($id);
        $book     = $borrowed->book();

        $borrowed->update([
            'returned' => true
        ]);

        $book->update([
            'available' => true
        ]);

        return redirect()->back()->with('message', 'Borrowed book returned');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrowed = BorrowedBook::findOrFail($id);
        $book     = $borrowed->book();

        $book->update([
            'available' => true
        ]);

        $borrowed->delete();

        return redirect()->back()->with('message' , 'Borrow Deleted');
    }
}
