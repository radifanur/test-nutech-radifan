<?php

use App\Http\Controllers\StokController;
use App\Models\Stok;
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

Route::get('/', [StokController::class, 'getData'])->name('home');
Route::get('/show/{id}', [StokController::class, 'showData'])->name('show');
Route::get('/update/{id}', [StokController::class, 'update'])->name('update');
Route::put('/updating/{id}', [StokController::class, 'updatingData'])->name('updating');
Route::get('/search', [StokController::class, 'search'])->name('search');
Route::get('/tambah', [StokController::class, 'addData'])->name('tambahData');
Route::post('/tambahData', [StokController::class, 'store'])->name('tambah');
Route::delete('/delete/{id}', [StokController::class, 'destroy'])->name('destroy');
