<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Question;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Data Game Utama
        $game = Game::create([
            'name' => 'Susun Huruf',
            'slug' => 'susun-huruf',
            'description' => 'Susunlah huruf-huruf acak menjadi istilah multimedia yang tepat.'
        ]);

        // 2. Buat Soal-soal untuk game tersebut
        $questions = [
            [
                'text' => 'Format gambar yang mendukung transparansi adalah...',
                'answer' => 'PNG',
                'options' => ['N', 'G', 'P']
            ],
            [
                'text' => 'Elemen multimedia yang berupa getaran udara...',
                'answer' => 'AUDIO',
                'options' => ['U', 'I', 'O', 'A', 'D']
            ],
            [
                'text' => 'Software editing video dari Adobe...',
                'answer' => 'PREMIERE',
                'options' => ['R', 'E', 'M', 'P', 'I', 'E', 'R', 'E']
            ],
            [
                'text' => 'Satuan terkecil dari sebuah gambar digital...',
                'answer' => 'PIXEL',
                'options' => ['L', 'E', 'X', 'I', 'P']
            ]
        ];

        foreach ($questions as $q) {
            Question::create([
                'game_id' => $game->id,
                'question_text' => $q['text'],
                'answer_key' => $q['answer'],
                'options_data' => json_encode($q['options']), // Simpan sebagai JSON
            ]);
        }
    }
}