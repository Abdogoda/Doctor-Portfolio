<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Background;
use App\Models\Media;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Social;
use App\Observers\AboutObserver;
use App\Observers\BackgroundObserver;
use App\Observers\MediaObserver;
use App\Observers\ScheduleObserver;
use App\Observers\ServiceObserver;
use App\Observers\SettingObserver;
use App\Observers\SocialObserver;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void{

        // register observers
        Media::observe(MediaObserver::class);
        Service::observe(ServiceObserver::class);
        Setting::observe(SettingObserver::class);
        Social::observe(SocialObserver::class);
        Schedule::observe(ScheduleObserver::class);
        About::observe(AboutObserver::class);
        Background::observe(BackgroundObserver::class);

        if (Schema::hasTable('services')) {
            $global_services = Cache::remember('services', now()->addMinutes(60), function () {
                return Service::all();
            });
        }else{ 
            $global_services = [];
        }

        if (Schema::hasTable('settings')) {
            $global_settings = Cache::remember('settings', now()->addMinutes(60), function () {
                return Setting::first();
            });
        }else{ 
            $global_settings = [];
        }
        
        if (Schema::hasTable('socials')) {
            $global_socials = Cache::remember('socials', now()->addMinutes(60), function () {
                return Social::first();
            });
        }else{ 
            $global_socials = [];
        }
        
        if (Schema::hasTable('schedules')) {
            $global_schedules = Cache::remember('schedules', now()->addMinutes(60), function () {
                return Schedule::all();
            });
        }else{ 
            $global_schedules = [];
        }
        
        if (Schema::hasTable('abouts')) {
            $global_about = Cache::remember('about', now()->addMinutes(60), function () {
                return [
                    "education" => About::where("type", "education")->first(),
                    "image" => About::where("type", "image")->first(),
                    "features" => About::where("type", "feature")->get(),
                    "paragraphs" => About::where("type", "paragraph")->get(),
                ];
            });
        }else{ 
            $global_about = [];
        }

        if (Schema::hasTable('backgrounds')) {
            $global_backgrounds = Cache::remember('backgrounds', now()->addMinutes(60), function () {
                return [
                    "all" => Background::all(),
                    "main_background" => Background::where("place", "الصورة الرئيسية")->first(),
                    "appointment_background" => Background::where("place", "صورة المواعيد")->first(),
                    "services_background" => Background::where("place", "صورة صفحة الخدمات")->first(),
                    "medias_background" => Background::where("place", "صورة صفحة الميديا")->first(),
                    "contact_background" => Background::where("place", "صورة صفحة التواصل")->first(),
                ];
            });
        }else{ 
            $global_backgrounds = [];
        }
        
        View::share('global_services', $global_services);
        View::share('global_settings', $global_settings);
        View::share('global_socials', $global_socials);
        View::share('global_schedules', $global_schedules);
        View::share('global_about', $global_about);
        View::share('global_backgrounds', $global_backgrounds);
    }
}