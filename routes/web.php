<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

Route::get('view', [DataController::class, 'view'])->name('view');
Route::get('/', [DataController::class, 'index'])->name('index');
Route::post('/', [DataController::class, 'store']);
Route::get('/ptn{id}', [DataController::class, 'updatePage'])->name('updPatient');
Route::post('/ptn{id}', [DataController::class, 'update'])->name('updatePatient');
Route::get('/dct{id}', [DataController::class, 'updateDocPage'])->name('updDoctor');
Route::post('/dct{id}', [DataController::class, 'updateDoc'])->name('updateDoctor');