<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\FakultasController;

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

Route::get('/', [MahasiswaController::class, 'index'])->name('index');
Route::get('/create', [MahasiswaController::class, 'create'])->name('create');
Route::post('/store', [MahasiswaController::class, 'store'])->name('store');
Route::get('/edit/{id}', [MahasiswaController::class, 'edit'])->name('edit');
Route::post('/update', [MahasiswaController::class, 'update'])->name('update');
Route::post('/delete/{id}', [MahasiswaController::class, 'delete'])->name('delete');

Route::get('/find_prodi', [FakultasController::class, 'find_prodi'])->name('find_prodi');
