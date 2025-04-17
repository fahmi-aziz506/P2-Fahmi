<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\menu;
use App\Models\outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $menu = menu::get();
        $outlet = outlet::all();
        $kategori = kategori::all();

        $editMenu = null;

        if ($request->has('edit')) {
            $editMenu = menu::find($request->edit);
        }

        return view('menu.index', compact('menu', 'outlet', 'editMenu', 'kategori'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama_menu' => 'required',
            'deskripsi' => 'nullable',
            'kategori_id' => 'required',
            'foto_menu' => 'nullable|mimes:jpeg,jpg,png,gif|max:5520',
            'stok' => 'required',
            'harga' => 'nullable',
            'outlet_id' => 'nullable',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $foto = $request->file('foto_menu');
        $filename = 0;

        if ($foto) {

            $filename = date('y-m-d') . '-' . $foto->getClientOriginalName();
            $path = 'foto_menu/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($foto));
        }

        $menu['nama_menu']       =   $request->nama_menu;
        $menu['deskripsi']      =   $request->deskripsi;
        $menu['kategori_id']    =   $request->kategori_id;
        $menu['stok']    =   $request->stok;
        $menu['harga']       =   $request->harga;
        $menu['outlet_id']       =   $request->outlet_id;
        $menu['foto_menu']       =   $filename;


        // simpan data
        menu::create($menu);
        // Redirect dengan flash message success
        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }


    public function update(Request $request, $id_menu)
    {
        $menu = menu::findOrFail($id_menu);

        $validator = Validator::make($request->all(), [
            'nama_menu' => 'required',
            'deskripsi' => 'nullable',
            'kategori_id' => 'required',
            'foto_menu' => 'nullable|mimes:jpeg,jpg,png,gif|max:5520',
            'stok' => 'required',
            'harga' => 'nullable',
            'outlet_id' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $menu->nama_menu = $request->nama_menu;
        $menu->deskripsi = $request->deskripsi;
        $menu->kategori_id = $request->kategori_id;
        $menu->stok = $request->stok;
        $menu->harga = $request->harga;
        $menu->outlet_id = $request->outlet_id;

        // ✔️ Jika checkbox 'Hapus Foto' dicentang
        if ($request->has('delete_foto_menu') && $menu->foto_menu) {
            $pathFoto = storage_path('app/public/foto_menu/' . $menu->foto_menu);
            if (file_exists($pathFoto)) {
                unlink($pathFoto);
            }
            $menu->foto_menu = null;
        }

        // ✔️ Jika upload foto baru
        if ($request->hasFile('foto_menu')) {
            // Hapus foto lama dulu jika ada
            if ($menu->foto_menu) {
                $pathFotoLama = storage_path('app/public/foto_menu/' . $menu->foto_menu);
                if (file_exists($pathFotoLama)) {
                    unlink($pathFotoLama);
                }
            }

            // Simpan foto baru
            $fotoBaru = $request->file('foto_menu')->store('foto_menu', 'public');
            $menu->foto_menu = basename($fotoBaru);
        }

        $menu->save();

        return redirect()->route('menu.index')->with('success', 'User berhasil diperbarui!');
    }
}
