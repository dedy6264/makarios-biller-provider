<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User};
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        session(['activeMenu'=>'User']);
        return view('contents.users.index');
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
            return Redirect::route('users.index')->with('status', 'user-created');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('users.index')->with('status', 'user-creation-failed');
        }
    }
     public function update(Request $request)
    {
        try {
            if (isset($request->password)){
                $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                ]);
                $user=User::where('id', $request->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                ]);
            }else{
                $request->validate([
                    'name'=>['required'],
                    'email'=>['required'],
                ]);
                $user=User::where('id', $request->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                ]);
            }
            return Redirect::route('users.index')->with('status', 'profile-updated');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('users.index')->with('status', 'profile-update-failed');
        }
    }
     public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        if($user->id === auth()->user()->id){
            return Redirect::route('users.index')->with('status', 'cannot-delete-self');
        }
        $user->delete();
        return Redirect::route('users.index')->with('status', 'profile-deleted');
    }
}
