<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerminalController; // Impor controller

// Rute untuk halaman Beranda (URL utama: /)
Route::get('/', [TerminalController::class, 'beranda'])->name('beranda');

// Rute untuk halaman Peta (URL: /peta)
Route::get('/peta', [TerminalController::class, 'peta'])->name('peta');

// Rute untuk halaman Tabel Informasi (URL: /tabel)
Route::get('/tabel', [TerminalController::class, 'tabel'])->name('tabel');

Route::get('/api/terminals', [TerminalController::class, 'json'])->name('terminals.json');

Route::get('/api/terminals-geojson', [App\Http\Controllers\TerminalController::class, 'geojson'])->name('api.terminals.geojson');
