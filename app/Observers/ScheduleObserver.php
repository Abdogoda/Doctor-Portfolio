<?php

namespace App\Observers;

use App\Models\Schedule;
use Illuminate\Support\Facades\Cache;

class ScheduleObserver
{
    

    public function created(Schedule $schedule): void{
        Cache::forget('schedules');
    }

    public function updated(Schedule $schedule): void{
        Cache::forget('schedules');
    }

    public function deleted(Schedule $schedule): void{
        Cache::forget('schedules');
    }

    public function restored(Schedule $schedule): void{
        //
    }

    public function forceDeleted(Schedule $schedule): void{
        //
    }
}