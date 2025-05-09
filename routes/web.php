<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Resources\Views\Auth;
use Resources\Views;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\ClientController;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*Route::get('/mark_create', function () {
    return view('mark_create');
})->middleware(['auth', 'verified'])->name('mark_create');*/

Route::middleware('auth')->group(function () {

    // marks

    Route::get('/marks', [MarkController::class, 'index'])->name('marks.index');
    Route::get('/marks/create', [MarkController::class, 'create'])->name('marks.create');
    Route::post('/marks', [MarkController::class, 'store'])->name('marks.store');
    Route::get('/marks/{mark}', [MarkController::class, 'show'])->name('marks.show');
    Route::get('/marks/{mark}/edit', [MarkController::class, 'edit'])->name('marks.edit');
    Route::put('/marks/{mark}', [MarkController::class, 'update'])->name('marks.update');
    Route::delete('/marks/{mark}', [MarkController::class, 'destroy'])->name('marks.destroy');

    // products

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // loans

    Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');
    Route::get('/loans/create', [LoanController::class, 'create'])->name('loans.create');
    Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');
    Route::get('/loans/{loan}', [LoanController::class, 'show'])->name('loans.show');
    Route::get('/loans/{loan}/edit', [LoanController::class, 'edit'])->name('loans.edit');
    Route::put('/loans/{loan}', [LoanController::class, 'update'])->name('loans.update');
    Route::delete('/loans/{loan}', [LoanController::class, 'destroy'])->name('loans.destroy');

    // request

    Route::get('/demands', [DemandController::class, 'index'])->name('demands.index');
    Route::get('/demands/create', [DemandController::class, 'create'])->name('demands.create');
    Route::post('/demands', [DemandController::class, 'store'])->name('demands.store');
    Route::get('/demands/{demand}', [DemandController::class, 'show'])->name('demands.show');
    Route::get('/demands/{demand}/edit', [DemandController::class, 'edit'])->name('demands.edit');
    Route::put('/demands/{demand}', [DemandController::class, 'update'])->name('demands.update');
    Route::delete('/demands/{demand}', [DemandController::class, 'destroy'])->name('demands.destroy');

    //clients

    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
    Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
