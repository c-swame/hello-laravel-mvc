<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/products', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('products');
Route::get('/products/create', [ProductController::class, 'create'])->middleware(['auth', 'verified', 'role:admin'  ])->name('product.create');
Route::post('/products/create', [ProductController::class, 'store'])->middleware(['auth', 'verified', 'role:admin'])->name('product.create');
Route::get('/products/{id}', [ProductController::class, 'show'])->middleware(['auth', 'verified', 'role:admin'])->name('product.show');
Route::delete('/products/{id}', [ProductController::class, 'delete'])->middleware(['auth', 'verified', 'role:admin'])->name('product.delete');
Route::put('/products/{id}', [ProductController::class, 'update'])->middleware(['auth', 'verified', 'role:admin'])->name('product.update');

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
