<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use App\Models\service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Ambil outlet yang terkait dengan admin yang sedang login
        $outlet_id = auth()->user()->outlet_id; // Asumsi outlet_id ada di user yang login

        // Jika user adalah , tampilkan semua data user
        if (auth()->user()->role == '') {
            $user = User::with('outlet')->where('role', 'admin')->get();
        } else {
            // Jika admin, filter berdasarkan outlet_id
            $user = User::with('outlet')->where('role', 'admin')
                ->where('outlet_id', $outlet_id) // Filter berdasarkan outlet yang sama
                ->get();
        }

        $outlet = Outlet::all(); // Data outlet untuk dropdown atau filter lainnya
        $editUser = null;

        // Cek apakah ada parameter 'edit' di URL
        if ($request->has('edit')) {
            $editUser = User::find($request->edit);
        }

        return view('user.index', compact('user', 'outlet', 'editUser'));
    }

    public function index_supervisor(Request $request)
    {
        // Ambil outlet yang terkait dengan supervisor yang sedang login
        $outlet_id = auth()->user()->outlet_id; // Asumsi outlet_id ada di user yang login

        // Jika user adalah , tampilkan semua data user
        if (auth()->user()->role == '') {
            $user = User::with('outlet')->where('role', 'supervisor')->get();
        } else {
            // Jika supervisor, filter berdasarkan outlet_id
            $user = User::with('outlet')->where('role', 'supervisor')
                ->where('outlet_id', $outlet_id) // Filter berdasarkan outlet yang sama
                ->get();
        }

        $outlet = Outlet::all(); // Data outlet untuk dropdown atau filter lainnya
        $editUser = null;

        // Cek apakah ada parameter 'edit' di URL
        if ($request->has('edit')) {
            $editUser = User::find($request->edit);
        }

        return view('user.index_supervisor', compact('user', 'outlet', 'editUser'));
    }

    public function index_kitchen(Request $request)
    {
        // Ambil outlet yang terkait dengan kitchen yang sedang login
        $outlet_id = auth()->user()->outlet_id; // Asumsi outlet_id ada di user yang login

        // Jika user adalah , tampilkan semua data user
        if (auth()->user()->role == '') {
            $user = User::with('outlet')->where('role', 'kitchen')->get();
        } else {
            // Jika kitchen, filter berdasarkan outlet_id
            $user = User::with('outlet')->where('role', 'kitchen')
                ->where('outlet_id', $outlet_id) // Filter berdasarkan outlet yang sama
                ->get();
        }

        $outlet = Outlet::all(); // Data outlet untuk dropdown atau filter lainnya
        $editUser = null;

        // Cek apakah ada parameter 'edit' di URL
        if ($request->has('edit')) {
            $editUser = User::find($request->edit);
        }

        return view('user.index_kitchen', compact('user', 'outlet', 'editUser'));
    }

    public function index_kasir(Request $request)
    {
        // Ambil outlet yang terkait dengan kasir yang sedang login
        $outlet_id = auth()->user()->outlet_id; // Asumsi outlet_id ada di user yang login

        // Jika user adalah , tampilkan semua data user
        if (auth()->user()->role == '') {
            $user = User::with('outlet')->where('role', 'kasir')->get();
        } else {
            // Jika kasir, filter berdasarkan outlet_id
            $user = User::with('outlet')->where('role', 'kasir')
                ->where('outlet_id', $outlet_id) // Filter berdasarkan outlet yang sama
                ->get();
        }

        $outlet = Outlet::all(); // Data outlet untuk dropdown atau filter lainnya
        $editUser = null;

        // Cek apakah ada parameter 'edit' di URL
        if ($request->has('edit')) {
            $editUser = User::find($request->edit);
        }

        return view('user.index_kasir', compact('user', 'outlet', 'editUser'));
    }

    public function index_waiter(Request $request)
    {
        // Ambil outlet yang terkait dengan waiter yang sedang login
        $outlet_id = auth()->user()->outlet_id; // Asumsi outlet_id ada di user yang login

        // Jika user adalah , tampilkan semua data user
        if (auth()->user()->role == '') {
            $user = User::with('outlet')->where('role', 'waiter')->get();
        } else {
            // Jika waiter, filter berdasarkan outlet_id
            $user = User::with('outlet')->where('role', 'waiter')
                ->where('outlet_id', $outlet_id) // Filter berdasarkan outlet yang sama
                ->get();
        }

        $outlet = Outlet::all(); // Data outlet untuk dropdown atau filter lainnya
        $editUser = null;

        // Cek apakah ada parameter 'edit' di URL
        if ($request->has('edit')) {
            $editUser = User::find($request->edit);
        }

        return view('user.index_waiter', compact('user', 'outlet', 'editUser'));
    }

    public function index_pelanggan(Request $request)
    {

        // Ambil outlet yang terkait dengan pelanggan yang sedang login
        $outlet_id = auth()->user()->outlet_id; // Asumsi outlet_id ada di user yang login

        // Jika user adalah , tampilkan semua data user
        if (auth()->user()->role == '') {
            $user = User::with('outlet')->where('role', 'pelanggan')->get();
        } else {
            // Jika pelanggan, filter berdasarkan outlet_id
            $user = User::with('outlet')->where('role', 'pelanggan')
                ->where('outlet_id', $outlet_id) // Filter berdasarkan outlet yang sama
                ->get();
        }

        $outlet = Outlet::all(); // Data outlet untuk dropdown atau filter lainnya
        $editUser = null;

        // Cek apakah ada parameter 'edit' di URL
        if ($request->has('edit')) {
            $editUser = User::find($request->edit);
        }

        return view('user.index_pelanggan', compact('user', 'outlet', 'editUser'));
    }


    public function dashboard()
    {
        $user = Auth::user();
        $today = now()->toDateString();

        if ($user->role === 'admin' || $user->role === 'supervisor') {
            // $totalServiceHariIni = service::whereDate('waktu_mulai', $today)->count();
            // $totalServiceKeseluruhan = Service::count();
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

    // public function create()
    // {
    //     $outlet = outlet::get();
    //     return view('user.create', compact('outlet'));
    // }

    // Tambah Data
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'foto' => 'nullable|mimes:jpeg,jpg,png,gif|max:5520',
            'telepon' => 'required',
            'alamat' => 'nullable',
            'role' => 'nullable',
            'outlet_id' => 'nullable',
            'jenkel' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $foto = $request->file('foto');
        $filename = 0;

        if ($foto) {

            $filename = date('y-m-d') . '-' . $foto->getClientOriginalName();
            $path = 'foto_user/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($foto));
        }

        $user['name']       =   $request->name;
        $user['email']      =   $request->email;
        $user['password']   =   Hash::make($request->password);
        $user['telepon']    =   $request->telepon;
        $user['alamat']    =   $request->alamat;
        $user['role']       =   $request->role;
        $user['jenkel']       =   $request->jenkel;
        $user['outlet_id']       =   $request->outlet_id;
        $user['foto']       =   $filename;


        // simpan data
        User::create($user);
        // Redirect dengan flash message success
        return redirect()->back()->with('success', 'User berhasil ditambahkan!');
    }

    // Edit data
    // public function edit(Request $request, $id)
    // {
    //     $data = User::find($id);

    //     // dd($data);
    //     return view('user.index', compact('data'));
    // }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'telepon' => 'nullable',
            'alamat' => 'nullable',
            'role' => 'required',
            'outlet_id' => 'nullable|exists:outlet,id_outlet',
            'jenkel' => 'nullable',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->telepon = $request->telepon;
        $user->alamat = $request->alamat;
        $user->role = $request->role;
        $user->outlet_id = $request->outlet_id;
        $user->jenkel = $request->jenkel;

        // ✔️ Jika checkbox 'Hapus Foto' dicentang
        if ($request->has('delete_foto') && $user->foto) {
            $pathFoto = storage_path('app/public/foto_user/' . $user->foto);
            if (file_exists($pathFoto)) {
                unlink($pathFoto);
            }
            $user->foto = null;
        }

        // ✔️ Jika upload foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama dulu jika ada
            if ($user->foto) {
                $pathFotoLama = storage_path('app/public/foto_user/' . $user->foto);
                if (file_exists($pathFotoLama)) {
                    unlink($pathFotoLama);
                }
            }

            // Simpan foto baru
            $fotoBaru = $request->file('foto')->store('foto_user', 'public');
            $user->foto = basename($fotoBaru);
        }

        $user->save();

        return redirect()->back()->with('success', 'User berhasil diperbarui!');
    }



    // Hapus data
    public function delete(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
        }

        return redirect()->back()->with('delete', 'User data berhasil di hapus!');
    }

    // Profile
    public function profile()
    {
        return view('profile.index')->with('user', auth()->user());
    }

    public function update_profile(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'foto' => 'nullable|mimes:jpeg,jpg,png,gif|max:5520',
            'telepon' => 'nullable',

        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // dd($request->all());

        $find = User::find($id);


        $user['name'] = $request->name;
        $user['telepon'] = $request->telepon;

        $foto = $request->file('foto');

        if ($request->has('delete_foto')) {
            Storage::disk('public')->delete('foto_user/' . $find->foto);
            $find->foto = 0;
        }

        if ($foto) {

            $filename = date('y-m-d') .  $foto->getClientOriginalName();
            $path  = 'foto_user/' . $filename;

            if ($find->foto) {
                Storage::disk('public')->delete('foto_user/' . $find->foto);
            }

            Storage::disk('public')->put($path, file_get_contents($foto));

            $user['foto']  = $filename;
        }

        $find->update($user);

        session()->flash('success', 'User profile berhasil di update');

        return redirect()->back();
    }
}
