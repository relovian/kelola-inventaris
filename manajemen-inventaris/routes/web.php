<?php

use App\Http\Controllers\persediaanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [persediaanController::class, 'index'])->name('persediaan.index');
Route::post('/', [persediaanController::class, 'store'])->name('persediaan.store');
Route::get('/TambahPersediaan', [persediaanController::class, 'create']);
Route::get('persediaan/{id}/edit', [persediaanController::class, 'edit'])->name('persediaan.edit');
Route::put('persediaan/{id}/update', [persediaanController::class, 'update'])->name('persediaan.update');