<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Question;

class GameController extends Controller
{
    public function play($slug)
    {
        $game = Game::where('slug', $slug)->firstOrFail();
        $questions = $game->questions;
        
        // In_random_order() akan mengacak urutan soal yang muncul
        if ($slug === 'trivia-quiz') {
            return view('games.trivia', compact('game', 'questions'));
    }
        return view('games.play', compact('game', 'questions'));
    }
}
