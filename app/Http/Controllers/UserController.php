<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();

        return view('admin.users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles      = Cache::get('roles');
        $roles = [
            'admin' => 1,
            'student' => 2,];

        return view('admin.forms.user.create', [
            'roles'      => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $roles = Cache::get('roles');

        $role_id = $request->has('role_id') ? $request->role_id : $roles['student'];

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $role_id,
            //'picture' => $picture,
        ]);

        return redirect(route('users.index'))->with('message', 'User Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user        = User::findOrFail($id);
        $user->title = $user->role()->get()->first()?->title;
        $books       = $user->borrowedBooks->sortByDesc('created_at')->sortBy('returned');

        return view('user.profile', $user, ['books' => $books]);
    }

    /**
     * Display the user profile.
     */
    public function getProfile()
    {
        $id=auth()->id();
        $user        = User::findOrFail($id);
        $user->title = $user->role()->get()->first()?->title;
        $books       = $user->borrowedBooks->sortByDesc('created_at')->sortBy('returned');


        return view('user.profile', $user, [ 'books' => $books ]);


    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user  = User::where('id', $id)->first();
        $roles = Cache::get('roles');
        $roles = [
            'admin' => 1,
            'student' => 2,];

        return view('admin.forms.user.update', $user, ['role' => $user->role, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $pic = time() . '-' . $request->name . '.' . $request->picture->extension();
        $request->picture->move('storage/images/user_images',$pic);

        User::where('id', $id)->update([
            ...$request->validated(),
            'password' => Hash::make($request->password),
            'picture' => $pic,
        ]);


        $route = strval(auth()->id()) === $id ? route('profile') : route('users.index');

        return redirect($route)->with('message', "User Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $role = $user->role;


        if ($role?->title === "admin")
            abort(403);

        $user->delete();

        return redirect(route('users.index'))->with('message', 'User Deleted');
    }
}
