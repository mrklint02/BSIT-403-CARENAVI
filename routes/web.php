<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

Route::get('view', [DataController::class, 'view'])->name('view');
Route::get('/', [DataController::class, 'index'])->name('index');
Route::post('/', [DataCollector::class, 'store']);