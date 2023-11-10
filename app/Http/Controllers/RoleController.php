<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function roles()
    {
        return view('Roles.BRole');
    }

    public function rroles()
    {
        return view('Roles.RRole');
    }

    public function store(Request $request, SessionManager $sessionManager)
    {

        $request->validate([
            'name' => 'required',
        ]);


        $rolexist = Role::where('name', $request->name)->first();

        if (empty($rolexist)) {
            $role = Role::create(['name' => $request->name]);
            $role->permissions()->sync($request->permissions);
            return redirect()->route('Roles');
        } else {
            return redirect()->route('Roles');
        }
    }

    public function eroles($id){
        return view('Roles.ERole', ['id' => $id]);
      }

    public function update(Request $request, Role $role, SessionManager $sessionManager)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('Roles');
    }
}
