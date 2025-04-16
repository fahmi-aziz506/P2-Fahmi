<?php

namespace App\Http\Controllers;

use App\Models\service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $today = now()->toDateString();

        if ($user->role === 'admin' || $user->role === 'supervisor') {
            // $totalServiceHariIni = service::whereDate('waktu_mulai', $today)->count();
            // $totalServiceKeseluruhan = service::count();
            // $jumlahTeknisi = User::where('role', 'teknisi')->count();

            return view('admin');
        } elseif ($user->role === 'kitchen') {
            // $totalServiceHariIni = Service::where('teknisi_id', $user->id)->whereDate('waktu_mulai', $today)->count();
            // $totalServiceKeseluruhan = Service::where('teknisi_id', $user->id)->count();

            return view('kitchen.index');
        } elseif ($user->role === 'waiter') {
            // $totalServiceHariIni = Service::where('teknisi_id', $user->id)->whereDate('waktu_mulai', $today)->count();
            // $totalServiceKeseluruhan = Service::where('teknisi_id', $user->id)->count();

            return view('waiter.index');
        } elseif ($user->role === 'kasir') {
            // $totalServiceHariIni = Service::where('teknisi_id', $user->id)->whereDate('waktu_mulai', $today)->count();
            // $totalServiceKeseluruhan = Service::where('teknisi_id', $user->id)->count();

            return view('kasir.index');
        } else {
            // $totalServiceHariIni = Service::where('pelanggan_id', $user->id)->whereDate('waktu_mulai', $today)->count();
            // $totalServiceKeseluruhan = Service::where('pelanggan_id', $user->id)->count();

            return view('pelanggan.index');
        }
    }

    public function supervisor()
    {
        return view('supervisor.index');
    }

    public function kitchen()
    {
        return view('kitchen.index');
    }

    public function pelanggan()
    {
        return view('pelanggan.index');
    }

    public function waiter()
    {
        return view('waiter.index');
    }
}
