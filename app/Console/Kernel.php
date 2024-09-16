<?php

namespace App\Console;

use App\Console\Commands\CreateUser;
use App\Console\Commands\GetUserEmail;
use App\Console\Commands\ResetUserPassword;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void{
        // $schedule->command('inspire')->hourly();
    }

    protected $commands = [
        GetUserEmail::class,
        CreateUser::class,
        ResetUserPassword::class,
    ];

    protected function commands(): void{
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}