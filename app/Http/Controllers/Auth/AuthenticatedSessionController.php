<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginRequest;

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

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // return $request->session()->all();
        Session::flush();
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function changePassword()
    {
        return view('auth.change-password');
    }

    public function processChangePassword(Request $request)
    {
        // cek password lama
        if(!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with('error', 'Password Lama tidak cocok');
        }

        if($request->new_password !== $request->new_password) {
            return back()->with('error'. 'password baru dan konfirmasi password tidak cocok');
        }

        auth()->user()->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect('/');
    }

}
