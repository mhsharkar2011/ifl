<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
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


// Category
Route::get('categories',[CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/create',[CategoryController::class, 'create'])->name('categories.create');
Route::post('categories/store',[CategoryController::class, 'store'])->name('categories.store');

// Brand
Route::get('brands',[BrandController::class, 'index'])->name('brands.index');
Route::get('brands/create',[BrandController::class, 'create'])->name('brands.create');
Route::post('brands/store',[BrandController::class, 'store'])->name('brands.store');

// Assets
Route::get('assets',[AssetController::class, 'index'])->name('assets.index');
Route::get('assets/create',[AssetController::class, 'create'])->name('assets.create');
Route::post('assets/store',[AssetController::class, 'store'])->name('assets.store');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
