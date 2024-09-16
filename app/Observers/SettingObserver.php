<?php

namespace App\Observers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingObserver{

    public function created(Setting $setting): void{
        Cache::forget('settings');
    }

    public function updated(Setting $setting): void{
        Cache::forget('settings');
    }

    public function deleted(Setting $setting): void{
        Cache::forget('settings');
    }

    public function restored(Setting $setting): void{
        //
    }

    public function forceDeleted(Setting $setting): void{
        //
    }
}