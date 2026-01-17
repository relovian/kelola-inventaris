<?php

use App\Http\Controllers\persediaanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [persediaanController::class, 'index']);
Route::get('/TambahPersediaan', [persediaanController::class, 'create']);