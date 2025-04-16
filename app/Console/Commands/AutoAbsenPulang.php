<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Absensi;
use Carbon\Carbon;

class AutoAbsenPulang extends Command
{
    protected $signature = 'absensi:auto-pulang';
    protected $description = 'Otomatis mengisi jam pulang untuk teknisi yang belum absen pulang setelah shift berakhir';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();
        $absensi = Absensi::whereNotNull('jam_masuk')
            ->whereNull('jam_pulang')
            ->whereHas('shift', function ($query) use ($now) {
                $query->where('tanggal', $now->toDateString())
                    ->whereTime('jam_selesai', '<', $now->format('H:i:s'));
            })->get();

        foreach ($absensi as $absen) {
            $absen->update([
                'jam_pulang' => $absen->shift->jam_selesai
            ]);
        }

        $this->info('Absen pulang otomatis telah diproses.');
    }
}
