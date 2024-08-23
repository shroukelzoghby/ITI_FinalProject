<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::get();

        return view('admin.authors', [ 'authors' => $authors ]);
    }

    /**
     * Display a listing of the resource for user.
     */
    public function userIndex()
    {
        $authors = Author::get();
        return view('admin.authors',[ 'authors' => $authors ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.forms.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        $pic = time() . '-' . $request->name . '.' . $request->picture->extension();
        $request->picture->move('storage/images/authors_images',$pic);

        Author::create([
            'name'    => $request->name,
            'picture' => $pic,
        ]);

        return redirect(route('authors'))->with('message', 'Author Added');
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
        $author = Author::where('id', $id)->first();

        return view('admin.forms.author.update', $author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAuthorRequest $request, string $id)
    {
        $pic = time() . '-' . $request->name . '.' . $request->picture->extension();
        $request->picture->move('storage/images/authors_images',$pic);

        Author::where('id', $id)->update([
            'name'    => $request->name,
            'picture' => $pic,
        ]);

        return redirect(route('authors'))->with('message', 'Author Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Author::where('id', $id)->delete();

        return redirect(route('authors'))->with('message', 'Author Added');
    }
}
