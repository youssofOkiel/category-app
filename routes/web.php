<?php

use App\Http\Controllers\categoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [categoryController::class, 'index'])->name('home-en');
Route::get('/ar', [categoryController::class, 'index'])->name('home-ar');
Route::post('subcat', [categoryController::class, 'subCat'])->name('subcat');
Route::post('items', [categoryController::class, 'items'])->name('items');
