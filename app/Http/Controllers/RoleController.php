<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class RoleController extends Controller
{

    public function index()
    {
        session(['activeMenu'=>'Role']);
        return view('viller.content.role');
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
        try {
            $request->validate([
                'role_code' => 'required|string|max:50|unique:roles',
                'role_name' => 'required|string|max:100',
            ]);

            $role = Role::create([
                'role_code' => strtoupper($request->input('role_code')),
                'role_name' => strtoupper($request->input('role_name')),
            ]);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Peran berhasil ditambahkan.',
                    'data' => $role,
                ]);
            }

            return redirect()->route('roles.index');
        } catch (ValidationException $th) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal.',
                    'errors' => $th->errors(),
                ], 422);
            }

            throw $th;
        } catch (\Throwable $th) {
            \Log::error('Failed create role', ['error' => $th]);
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Peran gagal ditambahkan.',
                ], 422);
            }

            return redirect()->route('roles.index')->with('status', 'role-creation-failed');
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'role_code' => ['required', 'string', 'max:50', Rule::unique('roles', 'role_code')->ignore($request->id)],
                'role_name' => 'required|string|max:100',
            ]);

            Role::where('id', $request->id)->update([
                'role_code' => strtoupper($request->input('role_code')),
                'role_name' => strtoupper($request->input('role_name')),
            ]);

            $role = Role::find($request->id);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Peran berhasil diperbarui.',
                    'data' => $role,
                ]);
            }

            return redirect()->route('roles.index');
        } catch (ValidationException $th) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal.',
                    'errors' => $th->errors(),
                ], 422);
            }

            throw $th;
        } catch (\Throwable $th) {
            \Log::error('Failed update role', ['error' => $th]);
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Peran gagal diperbarui.',
                ], 422);
            }

            return redirect()->route('roles.index')->with('status', 'role-update-failed');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $role = Role::findOrFail($request->id);
            $role->delete();

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Peran berhasil dihapus.',
                ]);
            }

            return Redirect::route('roles.index')->with('status', 'role-deleted');
        } catch (\Throwable $th) {
            \Log::error('Failed delete role', ['role_id' => $request->id, 'error' => $th]);
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Peran gagal dihapus.',
                ], 422);
            }

            return Redirect::route('roles.index')->with('status', 'role-deletion-failed');
        }
    }
}
