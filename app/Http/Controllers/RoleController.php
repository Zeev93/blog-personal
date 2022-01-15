<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::paginate(10);
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        $permissions = $request->permissions;
        $role = new Role($data);
        $role->save();
        $role->permissions()->sync($permissions);
        return redirect()->route('roles.index')->with('status', 'Role created succesfully.');

    }

    public function show(Role $role)
    {
        return view('role.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('role.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        $role->name = $data['name'];
        $role->permissions()->sync($request->permissions);
        return redirect()->route('roles.index')->with('status', 'Role updated succesfully.');
    }

    public function destroy(Role $role)
    {
        //
    }
}
