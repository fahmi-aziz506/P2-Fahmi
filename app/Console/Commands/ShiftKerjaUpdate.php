<?php

namespace App\Console\Commands;

use App\Models\shift_kerja;
use Illuminate\Console\Command;
use App\Models\ShiftKerja;
use Carbon\Carbon;

class ShiftKerjaUpdate extends Command
{
    protected $signature = 'shift:update';
    protected $description = 'Memperbarui shift kerja setiap minggu';

    public function handle()
    {
        $this->info('Memulai proses pergantian shift dan pembaruan tanggal...');

        $shifts = shift_kerja::all();

        foreach ($shifts as $shift) {
            // Perubahan shift otomatis: Pagi → Siang → Malam → Pagi
            $newShift = match ($shift->shift) {
                'pagi' => 'siang',
                'siang' => 'malam',
                'malam' => 'pagi',
                default => 'pagi',
            };

            $shift->update([
                'shift' => $newShift,
                'tanggal' => Carbon::parse($shift->tanggal)->addWeek(), // Tambah 7 hari
            ]);
        }

        $this->info('Shift kerja berhasil diperbarui untuk minggu berikutnya.');
    }
}
