<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('generateKodeSatuan')) {
    function generateKodeSatuan()
    {
        $prefix = 'SAT - ';
        
        // Ambil kode terakhir dari tabel satuan
        $lastKode = \App\Models\satuan::select('kode_satuan')
            ->orderBy('kode_satuan', 'desc')
            ->first();

        if ($lastKode) {
            $lastNumber = (int) substr($lastKode->kode_satuan, strlen($prefix));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT); // Format SAT0001
    }
}

