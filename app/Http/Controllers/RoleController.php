<?php

namespace App\Http\Controllers;

use App\Role;
use \DB;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'desc')->paginate(3);
        return view('roles.index', compact('roles', $roles));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:roles|max:255'
        ]);

        $data = [
            'name' => $request->input('name'),
            'created_at' => now(),
            'updated_at' => now()
        ];

        $result = ( DB::table('roles')->insert($data) )
        ? redirect()->route('roles.index')->with('addSuccess', 'Role was successfully created!')
        : redirect()->back()->with('addError', 'There are problems saving role, please try again');
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role', $role));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        $data = [
            'name' => $request->input('name'),
            'updated_at' => now()
        ];

        $result = ( DB::table('roles')->where('id', $role->id)->update($data) )
        ? redirect()->route('roles.index')->with('updateSuccess', 'Role was successfully updated!')
        : redirect()->back()->with('updateError', 'There are problems updating role, please try again');
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $result = ( $role->delete() )
        ? redirect()->route('roles.index')->with('deleteSuccess', 'Role was successfully moved to trash!')
        : redirect()->back()->with('deleteError', 'There are problems deleting the role, please try again');
        return $result;
    }
}
