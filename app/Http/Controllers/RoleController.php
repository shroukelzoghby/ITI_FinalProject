<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::get();

        return view('admin.roles', [ 'roles' => $roles ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.forms.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        Role::create([
            'title' => $request->title,
        ]);

        return redirect(route('roles.index'))->with('message', 'Role Added');
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
        $role = Role::findOrFail($id);

        return view('admin.forms.role.update', $role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRoleRequest $request, string $id)
    {
        Role::where('id', $id)->update([
            'title' => $request->name,
        ]);

        return redirect(route('roles.index'))->with('message', 'Role Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::where('id', $id)->delete();

        return redirect(route('roles.index'))->with('message', 'Role Deleted');
    }
}
