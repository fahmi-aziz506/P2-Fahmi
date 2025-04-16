<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function landing()
    {
        return view('frontend.master');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ], [
            'email.required'    => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email'     =>  $request->email,
            'password'  =>  $request->password,
        ];

        if (Auth::attempt($infologin)) {
            $user = Auth::user();

            // Simpan outlet_id ke session jika bukan admin/supervisor
            if (!in_array($user->role, ['admin', 'supervisor'])) {
                session(['outlet_id' => $user->outlet_id]);
            } else {
                session(['outlet_id' => null]);
            }

            // Arahkan ke dashboard sesuai role
            if ($user->role == 'admin') {
                return redirect('dashboard/admin');
            } elseif ($user->role == 'supervisor') {
                return redirect('dashboard/supervisor');
            } elseif ($user->role == 'kitchen') {
                return redirect('dashboard/kitchen');
            } elseif ($user->role == 'waiter') {
                return redirect('dashboard/waiter');
            } elseif ($user->role == 'pelanggan') {
                return redirect('dashboard/pelanggan');
            } elseif ($user->role == 'kasir') {
                return redirect('dashboard/kasir');
            }
        } else {
            return redirect('/login')->withErrors('Email atau password tidak sesuai')->withInput();
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
