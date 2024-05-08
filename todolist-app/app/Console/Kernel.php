<?php

namespace App\Console;

use App\Jobs\SendDailyTaskReport;
use App\Jobs\SendEmail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        //schedule para enviar email con excel
      $schedule->job(new SendDailyTaskReport)
        ->dailyAt('20:00')
        ->timezone('America/El_Salvador');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
