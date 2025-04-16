<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Return_;

class SettingController extends Controller
{
    public function index() {
        $setting = Setting::get();  
        return view('setting.index', compact('setting'));
    }

    //  Edit Setting
    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_perusahaan'   => 'nullable',
            'alamat' => 'nullable',
            'telepon' => 'nullable',
            'email_perusahaan' => 'required|email',
            'path_logo' => 'nullable|mimes:jpeg,jpg,png,gif|max:5520',
            'kartu_anggota' => 'nullable|mimes:jpeg,jpg,png,gif|max:5520',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // dd($request->all());

        $find = Setting::find($id);


   $data['nama_perusahaan'] = $request->nama_perusahaan;
   $data['alamat'] = $request->alamat;
   $data['telepon'] = $request->telepon;
   $data['email_perusahaan'] = $request->email_perusahaan;

//    if ($request->password) {
//       $user['password'] = Hash::make($request->password);
//    }

   $logo = $request->file('path_logo');

   if ($logo) {

       $filename = date('y-m-d') .  $logo->getClientOriginalName();
       $path  = 'logo_perusahaan/' . $filename;
  
       if ($find->path_logo) {
           Storage::disk('public')->delete('logo_perusahaan/' . $find->path_logo);
       }

       Storage::disk('public')->put($path,file_get_contents($logo));

       $data['path_logo']  = $filename;
   }

   $kartu = $request->file('kartu_anggota');

   if ($kartu) {

       $filename = date('y-m-d') .  $kartu->getClientOriginalName();
       $path  = 'kartu_anggota/' . $filename;
  
       if ($find->kartu_anggota) {
           Storage::disk('public')->delete('kartu_anggota/' . $find->kartu_anggota);
       }

       Storage::disk('public')->put($path,file_get_contents($kartu));

       $data['kartu_anggota']  = $filename;
   }
   
   $find->update($data);

   return redirect()->route('setting.index')->with('message', 'Settings edit success');
    }

}
