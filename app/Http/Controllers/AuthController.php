<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        // Jika sudah login, redirect sesuai role
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            elseif ($user->role === 'operator') {
                return redirect()->route('operator.dashboard');
            }
        }

        return view('login.login');
    }

    // Proses login
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Redirect sesuai role
            if ($user->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'))->with('success', 'Selamat datang, Admin!');
            } elseif ($user->role === 'operator') {
                return redirect()->intended(route('operator.dashboard'))->with('success', 'Selamat datang, Officer!');
            } else {
                return redirect()->back()->with('error', 'Level pengguna tidak valid.');
            }
        }

        // Jika gagal login
        return back()->with('error', 'Username atau Password salah.');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Anda telah berhasil logout.');
    }
}
