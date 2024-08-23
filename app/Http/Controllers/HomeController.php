<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::orderBy('updated_at', 'desc')->get();

        return view('home', [ 'books' => $books ]);
    }
}
