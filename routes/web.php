<?php

use App\Http\Controllers\Image\CreateController;
use App\Http\Controllers\Image\IndexController;
use App\Http\Controllers\Image\StoreController;
use App\Http\Controllers\ZipController;
use Illuminate\Support\Facades\Auth;
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
    return view('images.index');
})->name('image.index');



Route::get('/', IndexController::class)->name('image.index');
Route::get('/create', CreateController::class)->name('image.create');
Route::post('/', StoreController::class)->name('image.store');
Route::get('/images', \App\Http\Controllers\API\IndexController::class)
    ->name('api.index');
Route::get('/images/{image}', \App\Http\Controllers\API\ShowController::class)
    ->name('api.show');

Route::get('/zip/{img}', ZipController::class)->name('zip');

Auth::routes();