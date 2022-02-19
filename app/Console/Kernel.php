<?php

namespace App\Console;

use App\Jobs\UpdateLikeCounter;
use App\Jobs\UpdateViewCounter;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->job(UpdateLikeCounter::class)->everyMinute();
        $schedule->job(UpdateViewCounter::class)->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
