<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('shift_kerja:update')->weeklyOn(7, '23:59');
        $schedule->command('absensi:buat-harian')->dailyAt('06:00');
        $schedule->command('absensi:auto-pulang')->everyMinute();
        $schedule->command('absensi:generate-harian')->dailyAt('00:01'); // Jalan setiap jam 00:01
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
