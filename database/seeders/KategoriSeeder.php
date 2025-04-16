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
                'nama_kategori' => 'Body',
                'keterangan' => ''
            ],
            [
                'kode_kategori' => 'KAT - 0002',
                'nama_kategori' => 'Oli',
                'keterangan' => ''
            ],
            [
                'kode_kategori' => 'KAT - 0003',
                'nama_kategori' => 'Socket',
                'keterangan' => ''
            ],
            [
                'kode_kategori' => 'KAT - 0004',
                'nama_kategori' => 'Lampu',
                'keterangan' => ''
            ],
            [
                'kode_kategori' => 'KAT - 0005',
                'nama_kategori' => 'Ban',
                'keterangan' => ''
            ],
            [
                'kode_kategori' => 'KAT - 0006',
                'nama_kategori' => 'Aki',
                'keterangan' => ''
            ],
            [
                'kode_kategori' => 'KAT - 0007',
                'nama_kategori' => 'Busi',
                'keterangan' => ''
            ],
            [
                'kode_kategori' => 'KAT - 0008',
                'nama_kategori' => 'kampas',
                'keterangan' => ''
            ],
            [
                'kode_kategori' => 'KAT - 0009',
                'nama_kategori' => 'Filter',
                'keterangan' => ''
            ],

        ];

        foreach ($userData as $key => $value) {
            kategori::create($value);
        }
    }
}
