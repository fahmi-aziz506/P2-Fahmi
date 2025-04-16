<?php

namespace Database\Seeders;

use App\Models\outlet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nama_outlet' => 'Outlet Indramayu',
                'alamat' => 'Jl. Contoh No. 1',
                'kecamatan_perusahaan' => 'Kecamatan Contoh',
                'kota_perusahaan' => 'Kota Contoh',
                'provinsi_perusahaan' => 'Provinsi Contoh',
                'kode_pos' => '12345',
            ],

        ];

        foreach ($userData as $key => $value) {
            outlet::create($value);
        }
    }
}
