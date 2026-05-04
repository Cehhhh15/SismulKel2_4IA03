<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Urutannya wajib Game dulu, baru Question!
        $this->call([
            GameSeeder::class,
            QuestionSeeder::class,
        ]);
    }
}