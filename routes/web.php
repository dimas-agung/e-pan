<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(App\Http\Controllers\AnggotaController::class)->group(function () {
    Route::get('/anggota', 'index');
    Route::get('/anggota/create', 'create');
    Route::post('/anggota', 'store')->name('anggota.store');
    Route::get('/anggota/{anggota}', 'show');
    Route::get('/anggota/{anggota}/edit', 'edit');
    Route::put('/anggota/{anggota}', 'update')->name('anggota.update');
    Route::delete('/anggota/{anggota}', 'destroy')->name('anggota.destroy');
    Route::get('/api/data_anggota', 'dataanggota')->name('anggota.data_anggota');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
