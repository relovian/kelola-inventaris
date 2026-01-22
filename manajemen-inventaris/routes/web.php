<?php

use App\Http\Controllers\peminjamanController;
use App\Http\Controllers\persediaanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [persediaanController::class, 'index'])->name('persediaan.index');
Route::post('/', [persediaanController::class, 'store'])->name('persediaan.store');
Route::get('/TambahPersediaan', [persediaanController::class, 'create']);
Route::get('persediaan/{id}/edit', [persediaanController::class, 'edit'])->name('persediaan.edit');
Route::put('persediaan/{id}/update', [persediaanController::class, 'update'])->name('persediaan.update');
Route::get('persediaan/{id}/delete', [persediaanController::class, 'destroy'])->name('persediaan.destroy');
Route::get('peminjaman', [peminjamanController::class, 'index'])->name('peminjaman.index');
Route::post('peminjaman', [peminjamanController::class, 'store'])->name('peminjaman.store');
Route::get('/TambahPeminjaman', [peminjamanController::class, 'create'])->name('peminjaman.create');
Route::get('peminjaman/{id}/edit', [peminjamanController::class, 'edit'])->name('peminjaman.edit');
Route::put('peminjaman/{id}/update', [peminjamanController::class, 'update'])->name('peminjaman.update');
Route::get('peminjaman/{id}/destroy', [peminjamanController::class, 'destroy'])->name('peminjaman.destroy');