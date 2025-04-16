<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('generateKodeMerk')) {
    function generateKodeMerk()
    {
        $prefix = 'MRK - ';

        // Ambil kode terakhir dari tabel merk
        $lastKode = \App\Models\merk::select('kode_merk')
            ->orderBy('kode_merk', 'desc')
            ->first();

        if ($lastKode) {
            $lastNumber = (int) substr($lastKode->kode_merk, strlen($prefix));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT); // Format SAT0001
    }
}
