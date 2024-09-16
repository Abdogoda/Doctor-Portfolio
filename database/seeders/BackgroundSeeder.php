<?php

namespace Database\Seeders;

use App\Models\Background;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BackgroundSeeder extends Seeder{

    public function run(): void{
        $backgrounds = [
            [
                'place' => 'الصورة الرئيسية',
                'image' => ''
            ],
            [
                'place' => 'صورة المواعيد',
                'image' => ''
            ],
            [
                'place' => 'صورة صفحة الخدمات',
                'image' => ''
            ],
            [
                'place' => 'صورة صفحة الميديا',
                'image' => ''
            ],
            [
                'place' => 'صورة صفحة التواصل',
                'image' => ''
            ],
        ];

        foreach ($backgrounds as $background) {
            Background::create($background);
        }
    }
}