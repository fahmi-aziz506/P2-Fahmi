<?php

namespace Database\Seeders;

use App\Models\outlet;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
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

        $userData = [
            [
                'name'      => 'mas admin',
                'email'     => 'admin@gmail.com',
                'alamat'    => 'Jalanin aja dulu',
                'role'      => 'admin',
                'password'  => bcrypt('12345678'),
                'telepon'   => '099',
                'foto'      => '0',
                'outlet_id' => $outlet->id_outlet,
            ],
            [
                'name'      => 'mas supervisor',
                'email'     => 'supervisor@gmail.com',
                'alamat'    => 'Jalanin aja dulu',
                'role'      => 'supervisor',
                'password'  => bcrypt('12345678'),
                'telepon'   => '099',
                'foto'      => '0',
                'outlet_id' => $outlet->id_outlet,
            ],
            [
                'name'      => 'mas kitchen',
                'email'     => 'kitchen@gmail.com',
                'alamat'    => 'Jalanin aja dulu',
                'role'      => 'kitchen',
                'password'  => bcrypt('12345678'),
                'telepon'   => '099',
                'foto'      => '0',
                'outlet_id' => $outlet->id_outlet,
            ],
            [
                'name'      => 'mas pelanggan',
                'email'     => 'pelanggan@gmail.com',
                'alamat'    => 'Jalanin aja dulu',
                'role'      => 'pelanggan',
                'password'  => bcrypt('12345678'),
                'telepon'   => '099',
                'foto'      => '0',
                'outlet_id' => $outlet->id_outlet,
            ],
            [
                'name'      => 'mas waiter',
                'email'     => 'waiter@gmail.com',
                'alamat'    => 'Jalanin aja dulu',
                'role'      => 'waiter',
                'password'  => bcrypt('12345678'),
                'telepon'   => '099',
                'foto'      => '0',
                'outlet_id' => $outlet->id_outlet,
            ],
            [
                'name'      => 'mas kasir',
                'email'     => 'kasir@gmail.com',
                'alamat'    => 'Jalanin aja dulu',
                'role'      => 'kasir',
                'password'  => bcrypt('12345678'),
                'telepon'   => '099',
                'foto'      => '0',
                'outlet_id' => $outlet->id_outlet,
            ],
        ];

        foreach ($userData as $key => $value) {
            User::create($value);
        }
    }
}
