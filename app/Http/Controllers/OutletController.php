<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OutletController extends Controller
{
    public function index(Request $request)
    {

        $outlet = outlet::all();
        $editOutlet = null;

        if ($request->has('edit')) {
            $editOutlet = Outlet::findOrFail($request->edit);
        }

        return view('outlet.index', compact('outlet', 'editOutlet'));
    }

    // public function create()
    // {

    //     return view('outlet.create');
    // }

    public function store(Request $request)
    {

        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama_outlet' => 'required',
            'alamat' => 'nullable',
            'kecamatan_perusahaan' => 'required',
            'kota_perusahaan' => 'required',
            'provinsi_perusahaan' => 'required',
            'kode_pos' => 'nullable',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);


        $outlet['alamat']   =   $request->alamat;
        $outlet['nama_outlet']   =   $request->nama_outlet;
        $outlet['kecamatan_perusahaan']    =   $request->kecamatan_perusahaan;
        $outlet['kota_perusahaan']    =   $request->kota_perusahaan;
        $outlet['provinsi_perusahaan']    =   $request->provinsi_perusahaan;
        $outlet['kode_pos']    =   $request->kode_pos;


        // simpan data
        outlet::create($outlet);
        // Redirect dengan flash message success
        return redirect()->route('outlet.index')->with('success', 'Outlet Berhasil Ditambahkan!');
    }


    // Edit data
    // public function edit(Request $request, $id_outlet)
    // {
    //     $data = outlet::find($id_outlet);

    //     // dd($data);
    //     return view('outlet.index', compact('data'));
    // }

    public function update(Request $request, $id_outlet)
    {
        $outlet = Outlet::findOrFail($id_outlet);

        $validator = Validator::make($request->all(), [
            'nama_outlet' => 'required',
            'alamat' => 'required',
            'kecamatan_perusahaan' => 'required',
            'kota_perusahaan' => 'required',
            'provinsi_perusahaan' => 'required',
            'kode_pos' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // Simpan data dalam bentuk array, bukan objek
        $data = [
            'nama_outlet' => $request->nama_outlet,
            'alamat' => $request->alamat,
            'kecamatan_perusahaan' => $request->kecamatan_perusahaan,
            'kota_perusahaan' => $request->kota_perusahaan,
            'provinsi_perusahaan' => $request->provinsi_perusahaan,
            'kode_pos' => $request->kode_pos,
        ];

        $outlet->update($data);

        return redirect()->route('outlet.index')->with('edit', 'Outlet berhasil di edit!');
    }


    // Hapus data
    public function delete(Request $request, $id_outlet)
    {
        $outlet = outlet::find($id_outlet);

        if ($outlet) {
            $outlet->delete();
        }

        return redirect()->route('outlet.index')->with('delete', 'outlet berhasil di hapus!');
    }
}
