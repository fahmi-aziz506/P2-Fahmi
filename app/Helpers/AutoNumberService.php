<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('generateKodeService')) {
    function generateKodeService()
    {
        $prefix = 'SERV - ';

        // Ambil kode terakhir dari tabel Service
        $lastKode = \App\Models\service::select('kode_service')
            ->orderBy('kode_service', 'desc')
            ->first();

        if ($lastKode) {
            $lastNumber = (int) substr($lastKode->kode_service, strlen($prefix));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT); // Format SAT0001
    }
}
