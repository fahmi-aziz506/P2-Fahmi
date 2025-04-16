<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ShiftKerja;
use App\Models\Absensi;
use App\Models\shift_kerja;
use Carbon\Carbon;

class GenerateDailyAbsensi extends Command
{
    protected $signature = 'absensi:generate-harian';
    protected $description = 'Generate data absensi otomatis setiap hari berdasarkan shift kerja';

    public function handle()
    {
        $tanggalHariIni = Carbon::now()->toDateString();

        // Ambil semua shift kerja untuk hari ini
        $shifts = shift_kerja::where('tanggal', $tanggalHariIni)->get();

        foreach ($shifts as $shift) {
            // Cek apakah absensi sudah ada
            $cekAbsensi = Absensi::where('shift_id', $shift->id)->whereDate('created_at', $tanggalHariIni)->exists();

            if (!$cekAbsensi) {
                Absensi::create([
                    'shift_kerja_id' => $shift->id_shift_kerja,
                    'teknisi_id' => $shift->teknisi_id,
                    'status' => null, // Status awal kosong
                    'jam_masuk' => null,
                    'jam_pulang' => null,
                    'keterangan' => null,
                ]);
            }
        }

        $this->info('Absensi untuk hari ini berhasil dibuat.');
    }
}
