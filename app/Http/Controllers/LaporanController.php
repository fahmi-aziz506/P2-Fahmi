<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\outlet;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    public function admin(Request $request)
    {
        $outlets = \App\Models\Outlet::all();
        $selectedOutlet = $request->outlet_id;

        // Jika user 
        if (auth()->user()->role == '') {
            if ($selectedOutlet) {
                $user = User::with('outlet')
                    ->where('role', 'admin')
                    ->where('outlet_id', $selectedOutlet)
                    ->paginate(10); // PAGINATE langsung

            } else {
                $user = collect(); // kosong, tapi biar aman di view
            }
        } else {
            // Jika bukan , tampilkan data sesuai outlet miliknya
            $user = User::with('outlet')
                ->where('role', 'admin')
                ->where('outlet_id', auth()->user()->outlet_id)
                ->paginate(10); // PAGINATE juga di sini

            $selectedOutlet = auth()->user()->outlet_id;
        }

        return view('user.laporan_admin', compact('user', 'outlets', 'selectedOutlet'));
    }

    public function supervisor(Request $request)
    {
        $outlets = \App\Models\Outlet::all();
        $selectedOutlet = $request->outlet_id;

        // Jika user 
        if (auth()->user()->role == '') {
            if ($selectedOutlet) {
                $user = User::with('outlet')
                    ->where('role', 'supervisor')
                    ->where('outlet_id', $selectedOutlet)
                    ->paginate(10); // PAGINATE langsung

            } else {
                $user = collect(); // kosong, tapi biar aman di view
            }
        } else {
            // Jika bukan , tampilkan data sesuai outlet miliknya
            $user = User::with('outlet')
                ->where('role', 'supervisor')
                ->where('outlet_id', auth()->user()->outlet_id)
                ->paginate(10); // PAGINATE juga di sini

            $selectedOutlet = auth()->user()->outlet_id;
        }

        return view('user.laporan_supervisor', compact('user', 'outlets', 'selectedOutlet'));
    }

    public function kitchen(Request $request)
    {
        $outlets = \App\Models\Outlet::all();
        $selectedOutlet = $request->outlet_id;

        // Jika user 
        if (auth()->user()->role == '') {
            if ($selectedOutlet) {
                $user = User::with('outlet')
                    ->where('role', 'kitchen')
                    ->where('outlet_id', $selectedOutlet)
                    ->paginate(10); // PAGINATE langsung

            } else {
                $user = collect(); // kosong, tapi biar aman di view
            }
        } else {
            // Jika bukan , tampilkan data sesuai outlet miliknya
            $user = User::with('outlet')
                ->where('role', 'kitchen')
                ->where('outlet_id', auth()->user()->outlet_id)
                ->paginate(10); // PAGINATE juga di sini

            $selectedOutlet = auth()->user()->outlet_id;
        }

        return view('user.laporan_kitchen', compact('user', 'outlets', 'selectedOutlet'));
    }

    public function kasir(Request $request)
    {
        $outlets = \App\Models\Outlet::all();
        $selectedOutlet = $request->outlet_id;

        // Jika user 
        if (auth()->user()->role == '') {
            if ($selectedOutlet) {
                $user = User::with('outlet')
                    ->where('role', 'kasir')
                    ->where('outlet_id', $selectedOutlet)
                    ->paginate(10); // PAGINATE langsung

            } else {
                $user = collect(); // kosong, tapi biar aman di view
            }
        } else {
            // Jika bukan , tampilkan data sesuai outlet miliknya
            $user = User::with('outlet')
                ->where('role', 'kasir')
                ->where('outlet_id', auth()->user()->outlet_id)
                ->paginate(10); // PAGINATE juga di sini

            $selectedOutlet = auth()->user()->outlet_id;
        }

        return view('user.laporan_kasir', compact('user', 'outlets', 'selectedOutlet'));
    }


    public function waiter(Request $request)
    {
        $outlets = \App\Models\Outlet::all();
        $selectedOutlet = $request->outlet_id;

        // Jika user 
        if (auth()->user()->role == '') {
            if ($selectedOutlet) {
                $user = User::with('outlet')
                    ->where('role', 'waiter')
                    ->where('outlet_id', $selectedOutlet)
                    ->paginate(10); // PAGINATE langsung

            } else {
                $user = collect(); // kosong, tapi biar aman di view
            }
        } else {
            // Jika bukan , tampilkan data sesuai outlet miliknya
            $user = User::with('outlet')
                ->where('role', 'waiter')
                ->where('outlet_id', auth()->user()->outlet_id)
                ->paginate(10); // PAGINATE juga di sini

            $selectedOutlet = auth()->user()->outlet_id;
        }

        return view('user.laporan_waiter', compact('user', 'outlets', 'selectedOutlet'));
    }

    public function pelanggan(Request $request)
    {
        $outlets = \App\Models\Outlet::all();
        $selectedOutlet = $request->outlet_id;

        // Jika user 
        if (auth()->user()->role == '') {
            if ($selectedOutlet) {
                $user = User::with('outlet')
                    ->where('role', 'pelanggan')
                    ->where('outlet_id', $selectedOutlet)
                    ->paginate(10); // PAGINATE langsung

            } else {
                $user = collect(); // kosong, tapi biar aman di view
            }
        } else {
            // Jika bukan , tampilkan data sesuai outlet miliknya
            $user = User::with('outlet')
                ->where('role', 'pelanggan')
                ->where('outlet_id', auth()->user()->outlet_id)
                ->paginate(10); // PAGINATE juga di sini

            $selectedOutlet = auth()->user()->outlet_id;
        }

        return view('user.laporan_pelanggan', compact('user', 'outlets', 'selectedOutlet'));
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
