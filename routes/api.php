<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/marks', [MarkController::class, 'index'])->name('marks.index');
Route::get('/marks/create', [MarkController::class, 'create'])->name('marks.create');
Route::post('/marks', [MarkController::class, 'store'])->name('marks.store');
Route::get('/marks/{mark}', [MarkController::class, 'show'])->name('marks.show');
Route::get('/marks/{mark}/edit', [MarkController::class, 'edit'])->name('marks.edit');
Route::put('/marks/{mark}', [MarkController::class, 'update'])->name('marks.update');
Route::delete('/marks/{mark}', [MarkController::class, 'destroy'])->name('marks.destroy');
