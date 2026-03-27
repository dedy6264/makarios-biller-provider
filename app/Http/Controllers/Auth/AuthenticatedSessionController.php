<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\{User};


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $user=User::join('user_roles', 'user_roles.user_id', '=', 'users.id')
        ->join('roles', 'user_roles.role_id', '=', 'roles.id')
        ->where('users.email',$request->email)
        ->select(
            '*',
            )->first();
            // dd($user->name);
        session([
            'user_id'=>$user->user_id,
            'role_id'=>$user->role_id,
            'role_code'=>$user->role_code,
            'name'=>$user->name,
            'client_id'=>$user->client_id,
            'merchant_id'=>$user->merchant_id,
            'outlet_id'=>$user->outlet_id,
        ]);
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
