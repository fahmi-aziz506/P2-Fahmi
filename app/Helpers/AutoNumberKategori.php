<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('generateKodeKategori')) {
    function generateKodeKategori()
    {
        $prefix = 'KAT - ';

        // Ambil kode terakhir dari tabel kategori
        $lastKode = \App\Models\kategori::select('kode_kategori')
            ->orderBy('kode_kategori', 'desc')
            ->first();

        if ($lastKode) {
            $lastNumber = (int) substr($lastKode->kode_kategori, strlen($prefix));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT); // Format SAT0001
    }
}
