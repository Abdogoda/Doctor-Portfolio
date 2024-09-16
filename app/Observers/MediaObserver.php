<?php

namespace App\Observers;

use App\Models\Media;
use Illuminate\Support\Facades\Cache;

class MediaObserver
{
    /**
     * Handle the Media "created" event.
     */
    public function created(Media $media): void
    {
        Cache::forget('media');
        Cache::forget('special_media');
    }

    /**
     * Handle the Media "updated" event.
     */
    public function updated(Media $media): void
    {
        Cache::forget('media');
        Cache::forget('special_media');
    }

    /**
     * Handle the Media "deleted" event.
     */
    public function deleted(Media $media): void
    {
        Cache::forget('media');
        Cache::forget('special_media');
    }

    /**
     * Handle the Media "restored" event.
     */
    public function restored(Media $media): void
    {
        Cache::forget('media');
        Cache::forget('special_media');
    }

    /**
     * Handle the Media "force deleted" event.
     */
    public function forceDeleted(Media $media): void
    {
        Cache::forget('media');
        Cache::forget('special_media');
    }
}