<?php

namespace App\Http\Controllers;

use App\Models\DataAlat;
use App\Models\satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DataAlatController extends Controller
{
    public function index()
    {
        $alat = DataAlat::with('satuan')->get();
        return view('alat.index', compact('alat'));
    }

    public function create()
    {
        $satuan = satuan::all();

        return view('alat.create', compact('satuan'));
    }

    // Tambah Data
    public function store(Request $request)
    {

        $kodeAlat = generateKodeAlat();

        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'gambar' => 'nullable|mimes:jpeg,jpg,png,gif|max:5520',
            'nama_alat' => 'required',
            'keterangan' => 'nullable',
            'satuan_id' => 'nullable',
            'stok' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $gambar = $request->file('gambar');
        $filename = 0;

        if ($gambar) {

            $filename = date('y-m-d') . '-' . $gambar->getClientOriginalName();
            $path = 'gambar_alat/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($gambar));
        }

        $alat['kode_alat']    =   generateKodeAlat();
        $alat['gambar']          =   $filename;
        $alat['nama_alat']    =   $request->nama_alat;
        $alat['keterangan']      =   $request->keterangan;
        $alat['satuan_id']      =   $request->satuan_id;
        $alat['stok']      =   $request->stok;


        // simpan data
        DataAlat::create($alat);
        // Redirect dengan flash message success
        return redirect()->route('alat.index')->with('success', 'Alat berhasil ditambahkan!');
    }

    // Edit data
    public function edit(Request $request, $id_alat)
    {
        $alat = DataAlat::findOrFail($id_alat);
        $satuan = satuan::all();

        return view('alat.edit', compact('alat', 'satuan'));
    }

    public function update(Request $request, $id_alat)
{
    $request->validate([
        'nama_alat' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096', // 4MB max
        'keterangan' => 'nullable',
        'satuan_id' => 'required',
        'stok' => 'required',
    ]);

    $alat = DataAlat::findOrFail($id_alat);

    // Cek apakah pengguna ingin menghapus gambar
    if ($request->has('delete_gambar')) {
        if ($alat->gambar) {
            Storage::disk('public')->delete('gambar_alat/' . $alat->gambar);
        }
        $alat->gambar = 0; // Set gambar menjadi 0 jika dihapus
    }

    // Jika pengguna mengunggah gambar baru
    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $filename = date('Y-m-d') . '-' . uniqid() . '.' . $gambar->getClientOriginalExtension();
        $path = 'gambar_alat/' . $filename;

        // Hapus gambar lama jika ada
        if ($alat->gambar && $alat->gambar !== '0') {
            Storage::disk('public')->delete('gambar_alat/' . $alat->gambar);
        }

        // Simpan gambar baru
        Storage::disk('public')->put($path, file_get_contents($gambar));

        // Simpan nama file di database
        $alat->gambar = $filename;
    }

    // Update data lainnya
    $alat->update([
        'nama_alat' => $request->nama_alat,
        'keterangan' => $request->keterangan,
        'satuan_id' => $request->satuan_id,
        'stok' => $request->stok,
        'gambar' => $alat->gambar, // Tetap update gambar jika tidak dihapus
    ]);

    return redirect()->route('alat.index')->with('success', 'Alat berhasil diperbarui!');
}

    // Hapus data
    public function delete(Request $request, $id_alat)
    {
        $alat = DataAlat::find($id_alat);

        if ($alat) {
            $alat->delete();
        }

        return redirect()->route('alat.index')->with('delete', 'Data Alat berhasil di hapus!');
    }
}
