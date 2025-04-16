<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('generateKodeSparePart')) {
    function generateKodeSparePart()
    {
        $prefix = 'SPR - ';

        // Ambil kode terakhir dari tabel alat
        $lastKode = \App\Models\spare_part::select('kode_spare_part')
            ->orderBy('kode_spare_part', 'desc')
            ->first();

        if ($lastKode) {
            $lastNumber = (int) substr($lastKode->kode_spare_part, strlen($prefix));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT); // Format SAT0001
    }
}
