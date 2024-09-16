<?php

namespace App\Observers;

use App\Models\About;
use Illuminate\Support\Facades\Cache;

class AboutObserver{
    

    public function created(About $about): void{
        Cache::forget('about');
    }

    public function updated(About $about): void{
        Cache::forget('about');
    }

    public function deleted(About $about): void{
        Cache::forget('about');
    }

    public function restored(About $about): void{
        //
    }

    public function forceDeleted(About $about): void{
        //
    }
}