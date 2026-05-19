<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();

            // --- YE LOGIC ADD KIYA GAYA HAI ---
            // Agar login karne wala Admin hai, toh use Admin Dashboard bhejo
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // Baaki sab (Normal Users) ko purane dashboard par bhejo
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->onlyInput('email');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}