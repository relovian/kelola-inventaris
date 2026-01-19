<?php

use App\Http\Controllers\persediaanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [persediaanController::class, 'index'])->name('buku.index');
Route::post('/', [persediaanController::class, 'store'])->name('buku.store');
Route::get('/TambahPersediaan', [persediaanController::class, 'create']);