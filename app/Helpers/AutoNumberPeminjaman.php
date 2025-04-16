<?php

namespace App\Helpers;

use App\Models\Peminjaman;

class AutoNumberPeminjaman
{
    public static function generateKodePeminjaman()
    {
        $date = date('Ymd'); // Format: TahunBulanTanggal (20240130)
        $lastPeminjaman = Peminjaman::whereDate('created_at', today())->orderBy('kode_peminjaman', 'desc')->first();
        
        $nomorUrut = $lastPeminjaman ? ((int)substr($lastPeminjaman->kode_peminjaman, -3)) + 1 : 1;
        $nomorUrutFormatted = str_pad($nomorUrut, 3, '0', STR_PAD_LEFT); // Format 3 digit: 001, 002, 003

        return "PNJ - {$date}-{$nomorUrutFormatted}";
    }
}
