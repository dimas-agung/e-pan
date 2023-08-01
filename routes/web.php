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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dasboard');
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
Route::controller(App\Http\Controllers\SaksiController::class)->group(function () {
    Route::get('/saksi', 'index');
    Route::get('/saksi/pilih-anggota', 'pilihAnggota');
    Route::get('/saksi/cek-kuota-tps', 'cekTPSAvailable');
    Route::get('/saksi/create', 'create');
    Route::post('/saksi', 'store')->name('saksi.store');
    Route::get('/saksi/{saksi}', 'show');
    Route::get('/saksi/{saksi}/edit', 'edit');
    Route::put('/saksi/{saksi}', 'update')->name('saksi.update');
    Route::delete('/saksi/{saksi}', 'destroy')->name('saksi.destroy');
    Route::get('/api/data_anggota', 'dataanggota')->name('saksi.data_anggota');
});
Route::prefix('/wilayah')->group(function () {
    Route::controller(App\Http\Controllers\ProvinsiController::class)->group(function () {
        Route::get('/provinsi', 'index')->name('provinsi.index');
    });
    Route::controller(App\Http\Controllers\KabupatenController::class)->group(function () {
        Route::get('/kabupaten', 'index')->name('kabupaten.index');
    });
    Route::controller(App\Http\Controllers\KecamatanController::class)->group(function () {
        Route::get('/kecamatan', 'index')->name('kecamatan.index');
    });
    Route::controller(App\Http\Controllers\DesaController::class)->group(function () {
        Route::get('/desa', 'index')->name('desa.index');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');