<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder{

    public function run(): void{
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('123456')
        ]);

        $this->call([
            SettingSeeder::class,
            SocialSeeder::class,
            ScheduleSeeder::class,
            AboutSeeder::class,
            BackgroundSeeder::class,
        ]);
    }
}