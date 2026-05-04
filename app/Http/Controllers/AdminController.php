<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Question;

class AdminController extends Controller
{
    public function index()
    {
        $games = Game::all();
        $questions = Question::with('game')->latest()->get();
        return view('admin.index', compact('games', 'questions'));
    }

    public function storeQuestion(Request $request)
    {
        $request->validate([
            'game_id' => 'required',
            'question_text' => 'required',
            'answer_key' => 'required',
            'options' => 'required',
        ]);

        $game = Game::findOrFail($request->game_id);

        // Beda Game, Beda Cara Menyimpan Data
        if ($game->slug === 'susun-huruf') {
            $cleanAnswer = strtoupper(str_replace(' ', '', $request->answer_key));
            $optionsArray = array_map('strtoupper', array_map('trim', explode(',', $request->options)));
        } else {
            // Untuk Trivia Quiz (Pertahankan spasi dan huruf besar/kecil asli)
            $cleanAnswer = trim($request->answer_key);
            $optionsArray = array_map('trim', explode(',', $request->options));
        }

        try {
            Question::create([
                'game_id' => $request->game_id,
                'question_text' => $request->question_text,
                'answer_key' => $cleanAnswer,
                'options_data' => json_encode($optionsArray),
            ]);

            return back()->with('success', 'Soal berhasil disimpan!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    public function destroyQuestion($id)
    {
        Question::findOrFail($id)->delete();
        return back()->with('success', 'Soal berhasil dihapus!');
    }
}