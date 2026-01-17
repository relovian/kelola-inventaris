<?php

use App\Http\Controllers\inventarisController;
use Illuminate\Support\Facades\Route;

Route::get('/', [inventarisController::class, 'index']);
