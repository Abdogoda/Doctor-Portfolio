<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder{
    
    public function run(): void{
        $schedules = [
            [
                'days' => 'الأحد - الأربعاء',
                'start' => '08:00:00',
                'end' => '17:00:00'
            ],
            [
                'days' => 'الخميس',
                'start' => '08:00:00',
                'end' => '15:00:00'
            ],
            [
                'days' => 'الجمعة - السبت',
                'status' => false
            ]
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }
    }
}