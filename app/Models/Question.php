<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import ini

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'question_text',
        'answer_key',
        'options_data'
    ];

    /**
     * Relasi ke model Game
     * Satu soal dimiliki oleh satu game
     */
    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }
}