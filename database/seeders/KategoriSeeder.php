<?php

namespace Database\Seeders;

use App\Models\kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'kode_kategori' => 'KAT - 0001',
                'nama_kategori' => 'Makanan',
                'deskripsi' => ''
            ],
            [
                'kode_kategori' => 'KAT - 0002',
                'nama_kategori' => 'Minuman',
                'deskripsi' => ''
            ],

        ];

        foreach ($userData as $key => $value) {
            kategori::create($value);
        }
    }
}
