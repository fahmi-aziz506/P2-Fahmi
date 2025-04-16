<?php

namespace App\Http\Controllers;

use App\Helpers\AutoNumberKategori;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index(Request $request)
    {

        $kategori = kategori::all();
        $editkategori = null;

        if ($request->has('edit')) {
            $editkategori = kategori::findOrFail($request->edit);
        }

        return view('kategori.index', compact('kategori', 'editkategori'));
    }

    // public function create()
    // {

    //     return view('kategori.create', compact('kategori'));
    // }

    public function store(Request $request)
    {

        $kodekategori = generateKodekategori();

        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required',
            'deskripsi' => 'nullable',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);


        $kategori['kode_kategori']   =   generateKodekategori();
        $kategori['nama_kategori']   =   $request->nama_kategori;
        $kategori['deskripsi']    =   $request->deskripsi;


        // simpan data
        kategori::create($kategori);
        // Redirect dengan flash message success
        return redirect()->route('kategori.index')->with('success', 'kategori berhasil ditambahkan!');
    }


    // Edit data
    // public function edit(Request $request, $id_kategori)
    // {
    //     $data = kategori::find($id_kategori);

    //     // dd($data);
    //     return view('kategori.edit', compact('data'));
    // }

    public function update(Request $request, $id_kategori)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required',
            'deskripsi' => 'nullable',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $find = kategori::find($id_kategori);

        $kategori['nama_kategori']       =   $request->nama_kategori;
        $kategori['deskripsi']        =   $request->deskripsi;

        // simpan data
        $find->update($kategori);

        // Redirect dengan flash message success
        return redirect()->route('kategori.index')->with('edit', 'Kategori berhasil di edit!');
    }

    // Hapus data
    public function delete(Request $request, $id_kategori)
    {
        $kategori = kategori::find($id_kategori);

        if ($kategori) {
            $kategori->delete();
        }

        return redirect()->route('kategori.index')->with('delete', 'kategori berhasil di hapus!');
    }
}
