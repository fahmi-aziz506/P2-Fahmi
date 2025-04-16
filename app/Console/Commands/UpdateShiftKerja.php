<?php

namespace App\Console\Commands;

use App\Models\shift_kerja;
use Illuminate\Console\Command;

class UpdateShiftKerja extends Command
{

    protected $signature = 'shift_kerja:update';
    protected $description = 'Perbarui shift kerja setiap minggu secara otomatis';

    public function handle()
    {
        shift_kerja::updateShiftsWeekly();
        $this->info('Shift kerja telah diperbarui untuk minggu ini.');
    }
}
