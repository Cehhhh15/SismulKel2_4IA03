<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Data Game Susun Huruf (Sebagai ID 1)
        Game::firstOrCreate(
            ['slug' => 'susun-huruf'],
            [
                'name' => 'Susun Huruf',
                'description' => 'Susunlah huruf-huruf acak menjadi jawaban yang tepat.'
            ]
        );

        // 2. Buat Data Game Trivia Quiz (Sebagai ID 2)
        Game::firstOrCreate(
            ['slug' => 'trivia-quiz'],
            [
                'name' => 'Trivia Quiz',
                'description' => 'Uji wawasanmu dengan kuis pilihan ganda yang menegangkan!'
            ]
        );
    }
}