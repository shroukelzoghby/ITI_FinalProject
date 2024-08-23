<?php

namespace App\Http\Controllers;

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

\Auth::routes();

// Admin routes
//Route::middleware(['auth', IsAdmin::class])->
Route::middleware([ 'auth', 'role:admin' ])->prefix('admin')->group(function() {
    Route::resources(
        [
            'authors'        => AuthorController::class,
            'books'          => BookController::class,
            'borrowed-books' => BorrowedBookController::class,
            'roles'          => RoleController::class,
        ],
        [
            'except' => [ 'show' ]
        ]
    );

    Route::resource('users', UserController::class);
});

// User routes
Route::middleware([ 'auth' ])->group(function() {
    Route::get('/home', [ HomeController::class, 'index' ])->name('home');

    // Authors
    Route::get('/authors',      [ AuthorController::class, 'userIndex' ])->name('authors');
    Route::get('/authors/{id}', [ AuthorController::class, 'show' ])->name('authors.show');

    // Books
    Route::get('/books',           [ BookController::class, 'userIndex' ])->name('books');
    Route::get('/books/{id}',      [ BookController::class, 'show' ])->name('books.show');


    // Borrowed Books
    Route::post('/books/{book}/borrowed-books', [ BorrowedBookController::class, 'userStore' ])->name('borrow-book');
    Route::patch('/borrowed-books/{id}',        [ BorrowedBookController::class, 'return' ])->name('return-book');

    // Users
    Route::get('/users/self',        [ UserController::class, 'getProfile' ])->name('profile');
    Route::get('/users/{user}/edit', [ UserController::class, 'edit' ])->middleware('owner')->name('user-edit');
    Route::put('/users/{user}',      [ UserController::class, 'update' ])->middleware('owner')->name('user-update');
});

