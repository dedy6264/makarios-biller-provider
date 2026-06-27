<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User};
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index(){
        session(['activeMenu'=>'User']);
        return view('viller.content.user');
    }
    public function getAll(){
        $dataUser=User::select('*')->get();
        $dt=[
            "draw"=> 1,
            "recordsTotal"=> count($dataUser->toArray()),
            "recordsFiltered"=> count($dataUser->toArray()),
            "data"=> $dataUser->toArray(),
        ];
        return response()->json($dt);
    }
    public function store(Request $request){
        try {
            $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pengguna berhasil ditambahkan.',
                    'data' => $user,
                ]);
            }

            return Redirect::route('users.index')->with('status', 'user-created');
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
            \Log::error("message", ['error' => $th]);
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pengguna gagal ditambahkan.',
                ], 422);
            }
            return Redirect::route('users.index')->with('status', 'user-creation-failed');
        }
    }
     public function update(Request $request){
        try {
            if (isset($request->password)){
                $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($request->id)],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                ]);
                $user=User::where('id', $request->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                ]);
            }else{
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($request->id)],
                ]);
                $user=User::where('id', $request->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                ]);
            }

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data pengguna berhasil diperbarui.',
                ]);
            }

            return Redirect::route('users.index')->with('status', 'profile-updated');
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
            \Log::error("message", ['error' => $th]);
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data pengguna gagal diperbarui.',
                ], 422);
            }
            return Redirect::route('users.index')->with('status', 'profile-update-failed');
        }
    }
     public function destroy(Request $request){
        $deleted = User::userDelete($request->id);
        if ($deleted) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pengguna berhasil dihapus.',
                ]);
            }

            return Redirect::route('users.index')
                ->with('status', 'profile-deleted');
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Pengguna gagal dihapus.',
            ], 422);
        }

        return Redirect::route('users.index')
            ->with('status', 'profile-deletion-failed');
        }
    }
