<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{

    public function index()
    {
        session(['activeMenu'=>'Role']);
        return view('contents.roles.index');
    }
    public function getAll(){
        $dataRole=Role::select('*')->get();
        $dt=[
            "draw"=> 1,
            "recordsTotal"=> count($dataRole->toArray()),
            "recordsFiltered"=> count($dataRole->toArray()),
            "data"=> $dataRole->toArray(),
        ];
        return response()->json($dt);
    }
    public function store(Request $request)
    {
        $request->validate([
            'role_code' => 'required|string|max:50|unique:roles',
            'role_name' => 'required|string|max:100',
        ]);

        Role::create([
            'role_code' => strtoupper($request->input('role_code')),
            'role_name' => strtoupper($request->input('role_name')),
        ]);

        return redirect()->route('roles.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'role_code' => 'required|string|max:50|unique:roles,role_code,' . $request->id,
            'role_name' => 'required|string|max:100',
        ]);

        Role::where('id', $request->id)->update([
            'role_code' => strtoupper($request->input('role_code')),
            'role_name' => strtoupper($request->input('role_name')),
        ]);
        return redirect()->route('roles.index');
    }

    public function destroy(Request $request)
    {
        $role = Role::findOrFail($request->id);

        $role->delete();
        return Redirect::route('roles.index')->with('status', 'role-deleted');
    }
}
