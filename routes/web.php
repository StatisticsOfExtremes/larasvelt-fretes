<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CarreteiroController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/fretes', function () {
    return Inertia::render('Fretes');
});

Route::prefix('carreteiros')->group(function () {
    Route::get('/', [CarreteiroController::class, 'index'])->name('carreteiros.index');
    
    Route::get('/novo', [CarreteiroController::class, 'create'])->name('carreteiros.novo');
    
    Route::post('/', [CarreteiroController::class, 'store']);
});


Route::post('/logout', function () {
    return dd("logout the user");
});



