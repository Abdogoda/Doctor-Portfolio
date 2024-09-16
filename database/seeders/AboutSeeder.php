<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder{
    public function run(): void{
        $about = [
            'education',
            'image',
            'paragraph',
            'paragraph',
            'feature',
            'feature',
            'feature',
            'feature'
        ];
        foreach ($about as $item) {
            About::create(['type' => $item]);
        }
    }
}