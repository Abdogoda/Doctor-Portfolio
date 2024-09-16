<?php

namespace App\Observers;

use App\Models\Background;
use Illuminate\Support\Facades\Cache;

class BackgroundObserver{
    
    public function created(Background $background): void{
        Cache::forget('backgrounds');
    }

    public function updated(Background $background): void{
        Cache::forget('backgrounds');
    }

    public function deleted(Background $background): void{
        Cache::forget('backgrounds');
    }

    public function restored(Background $background): void{
        //
    }

    public function forceDeleted(Background $background): void{
        //
    }
}