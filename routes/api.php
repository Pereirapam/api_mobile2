<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;


Route::apiResource('marks', MarkController::class);


//Route::get('/user', function (Request $request) {
   // return $request->user();
//})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {



    Route::apiResource('products', ProductController::class);
    
    Route::apiResource('demands', DemandController::class);

    Route::apiResource('loans', LoanController::class);

    Route::apiResource('loans', LoanController::class);

    Route::apiResource('clients', ClientController::class);

    // Perfil
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
    Route::delete('/profile', [ProfileController::class, 'destroy']);

    // Logout
    //Route::post('/logout', [AuthController::class, 'logout']);

});
