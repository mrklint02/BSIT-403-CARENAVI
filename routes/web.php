<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

Route::get('view', [DataController::class, 'view'])->name('view');
Route::get('/', [DataController::class, 'index'])->name('index');