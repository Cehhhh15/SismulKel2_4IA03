<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 1. Rute Auth (Publik)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 2. Rute Game (Publik)
Route::get('/play/{slug}', [GameController::class, 'play'])->name('game.play');

// 3. Proteksi Grup Admin (Hanya rute di dalam sini yang dikunci)
Route::middleware(['admin.check'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/question', [AdminController::class, 'storeQuestion'])->name('admin.question.store');
    Route::post('/admin/cocok-kartu', [AdminController::class, 'storeCocokKartu'])->name('admin.cocok-kartu.store');
    Route::delete('/admin/question/{id}', [AdminController::class, 'destroyQuestion'])->name('admin.question.destroy');
});