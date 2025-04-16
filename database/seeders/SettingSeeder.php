<?php

namespace Database\Seeders;

use App\Models\outlet;
use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Nama outlet yang ingin dikaitkan
        $namaOutlet = 'Outlet Indramayu';

        // Cari atau buat outlet berdasarkan nama_outlet
        $outlet = outlet::firstOrCreate(
            ['nama_outlet' => $namaOutlet],
            [
                'alamat' => 'Jl. Contoh No. 1',
                'kecamatan_perusahaan' => 'Kecamatan Contoh',
                'kota_perusahaan' => 'Kota Contoh',
                'provinsi_perusahaan' => 'Provinsi Contoh',
                'kode_pos' => '12345',
            ]
        );

        $dataSetting = [
            [
                'nama_perusahaan'  => 'Bengkel MVP',
                'alamat'           => 'Jln.Sekolah Internasional 1-6 Antapani, Kota Bandung, Jawa Barat',
                'telepon'          => '62812345678',
                'email_perusahaan' => 'BengkelMVP@gmail.com',
                'path_logo'        => '{{asset("form/img/brands/id card.jpg")}}',
                'outlet_id' => $outlet->id_outlet,
            ],
        ];

        foreach ($dataSetting as $key => $value) {
            Setting::create($value);
        }
    }
}
