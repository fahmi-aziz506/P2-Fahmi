<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\outlet;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    public function admin()
    {
        $paginate = User::paginate(9);
        $user = User::with('outlet')->where('role', 'admin')->get();

        return view('user.laporan_admin', compact('user', 'paginate'));
    }

    public function supervisor()
    {
        $paginate = User::paginate(9);
        $user = User::with('outlet')->where('role', 'supervisor')->get();

        return view('user.laporan_supervisor', compact('user', 'paginate'));
    }

    public function kitchen()
    {
        $paginate = User::paginate(9);
        $user = User::with('outlet')->where('role', 'kitchen')->get();

        return view('user.laporan_kitchen', compact('user', 'paginate'));
    }

    public function kasir()
    {
        $paginate = User::paginate(9);
        $user = User::with('outlet')->where('role', 'kasir')->get();

        return view('user.laporan_kasir', compact('user', 'paginate'));
    }

    public function waiter()
    {
        $paginate = User::paginate(9);
        $user = User::with('outlet')->where('role', 'waiter')->get();

        return view('user.laporan_waiter', compact('user', 'paginate'));
    }

    public function pelanggan()
    {
        $paginate = User::paginate(9);
        $user = User::with('outlet')->where('role', 'pelanggan')->get();

        return view('user.laporan_pelanggan', compact('user', 'paginate'));
    }

    public function kategori()
    {
        $paginate = kategori::paginate(9);
        $kategori = kategori::all();

        return view('kategori.laporan', compact('kategori', 'paginate'));
    }

    public function outlet()
    {
        $paginate = outlet::paginate(9);
        $outlet = outlet::all();

        return view('outlet.laporan', compact('outlet', 'paginate'));
    }
}
