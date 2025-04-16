<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('generateKodeAlat')) {
    function generateKodeAlat()
    {
        $prefix = 'ALT - ';
        
        // Ambil kode terakhir dari tabel alat
        $lastKode = \App\Models\dataAlat::select('kode_alat')
            ->orderBy('kode_alat', 'desc')
            ->first();

        if ($lastKode) {
            $lastNumber = (int) substr($lastKode->kode_alat, strlen($prefix));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT); // Format SAT0001
    }
}

