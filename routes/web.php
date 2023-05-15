<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ManagersController;
use App\Http\Controllers\SupermarketController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

 
// Route::controller( App\Http\Controllers\SupermarketController::class)->group(function () {

//     Route::get('/supermarkets','index');

//     Route::get('/add-supermarket','create');

//     Route::post('/add-supermarket','store');
// });

Route::prefix('supermarkets')->group(function () {
    Route::get('/', [SupermarketController::class, 'index'])->name('supermarkets.index');
    Route::get('/add', [SupermarketController::class, 'create'])->name('supermarkets.create');
    Route::post('/add', [SupermarketController::class, 'store'])->name('supermarkets.store');
    Route::get('/{id}/edit', [SupermarketController::class, 'edit'])->name('supermarkets.edit');
    Route::put('/{id}', [SupermarketController::class, 'update'])->name('supermarkets.update');
    Route::delete('/{id}', [SupermarketController::class, 'destroy'])->name('supermarkets.destroy');
});


Route::prefix('managers')->group(function(){
        Route::get('/',[ManagersController::class,'index'])->name('managers.index');
        Route::get('/add',[ManagersController::class,'create'])->name('managers.create');
        Route::post('/add', [ManagersController::class, 'store'])->name('managers.store');
        Route::get('/{id}/edit', [ManagersController::class, 'edit'])->name('managers.edit');
        Route::put('/{id}', [ManagersController::class, 'update'])->name('managers.update');
        Route::delete('/{id}', [ManagersController::class, 'destroy'])->name('managers.destroy');
});