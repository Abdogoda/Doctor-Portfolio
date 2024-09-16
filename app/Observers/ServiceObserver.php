<?php

namespace App\Observers;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class ServiceObserver{

    public function created(Service $service): void{
        Cache::forget('services');
    }

    public function updated(Service $service): void{
        Cache::forget('services');
    }

    public function deleted(Service $service): void{
        Cache::forget('services');
    }

    public function restored(Service $service): void{
        //
    }

    public function forceDeleted(Service $service): void{
        //
    }
}