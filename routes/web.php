<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\VolumeController;
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

Route::get('/', LandingController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/volume', [VolumeController::class, 'index'])->name('volume.index');
Route::get('/volume/show', [VolumeController::class, 'show'])->name('volume.show');
Route::get('/volume/edit', [VolumeController::class, 'edit'])->name('volume.edit');
Route::put('/volume/edit', [VolumeController::class, 'update'])->name('volume.update');
Route::get('/volume/create', [VolumeController::class, 'create'])->name('volume.create');
Route::post('/volume/store', [VolumeController::class, 'store'])->name('volume.store');


// Route::resource('volume', VolumeController::class);
