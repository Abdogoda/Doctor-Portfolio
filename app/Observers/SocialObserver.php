<?php

namespace App\Observers;

use App\Models\Social;
use Illuminate\Support\Facades\Cache;

class SocialObserver{

    public function created(Social $social): void{
        Cache::forget('socials');
    }

    public function updated(Social $social): void{
        Cache::forget('socials');
    }

    public function deleted(Social $social): void{
        Cache::forget('socials');
    }

    public function restored(Social $social): void{
        //
    }

    public function forceDeleted(Social $social): void{
        //
    }
}