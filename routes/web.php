<?php

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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

#Admin Group
Route::get('/home', [App\Http\Controllers\PagesController::class, 'index']);
#Tamu
Route::get('/buku-tamu', [App\Http\Controllers\TamuController::class, 'index']);
Route::get('/buku-tamu-add', [App\Http\Controllers\TamuController::class, 'create']);
Route::post('/buku-tamu-save', [App\Http\Controllers\TamuController::class, 'store']);
Route::get('/buku-tamu-edit/{id}', [App\Http\Controllers\TamuController::class, 'edit']);
Route::post('/buku-tamu-update/{id}', [App\Http\Controllers\TamuController::class, 'update']);
Route::get('/buku-tamu-delete/{id}', [App\Http\Controllers\TamuController::class, 'destroy']);
#Inventaris Barang
Route::get('/inventaris-barang', [App\Http\Controllers\BarangController::class, 'index']);
Route::get('/inventaris-barang-add', [App\Http\Controllers\BarangController::class, 'create']);
Route::post('/inventaris-barang-save', [App\Http\Controllers\BarangController::class, 'store']);
Route::get('/inventaris-barang-edit/{id}', [App\Http\Controllers\BarangController::class, 'edit']);
Route::post('/inventaris-barang-update/{id}', [App\Http\Controllers\BarangController::class, 'update']);
Route::get('/inventaris-barang-delete/{id}', [App\Http\Controllers\BarangController::class, 'destroy']);
#Kas
Route::get('/kas', [App\Http\Controllers\KasController::class, 'index']);
Route::get('/kas-add', [App\Http\Controllers\KasController::class, 'create']);
Route::post('/kas-save', [App\Http\Controllers\KasController::class, 'store']);
Route::get('/kas-edit/{id}', [App\Http\Controllers\KasController::class, 'edit']);
Route::post('/kas-update/{id}', [App\Http\Controllers\KasController::class, 'update']);
Route::get('/kas-delete/{id}', [App\Http\Controllers\KasController::class, 'destroy']);
#Hasil Produksi
Route::get('/hasil-produksi', [App\Http\Controllers\ProduksiController::class, 'index']);
Route::get('/hasil-produksi-add', [App\Http\Controllers\ProduksiController::class, 'create']);
Route::post('/hasil-produksi-save', [App\Http\Controllers\ProduksiController::class, 'store']);
Route::get('/hasil-produksi-edit/{id}', [App\Http\Controllers\ProduksiController::class, 'edit']);
Route::post('/hasil-produksi-update/{id}', [App\Http\Controllers\ProduksiController::class, 'update']);
Route::get('/hasil-produksi-delete/{id}', [App\Http\Controllers\ProduksiController::class, 'destroy']);
#Daftar Anggota
Route::get('/list-anggota', [App\Http\Controllers\AnggotaController::class, 'index']);
Route::get('/list-anggota-add', [App\Http\Controllers\AnggotaController::class, 'create']);
Route::post('/list-anggota-save', [App\Http\Controllers\AnggotaController::class, 'store']);
Route::get('/list-anggota-edit/{id}', [App\Http\Controllers\AnggotaController::class, 'edit']);
Route::post('/list-anggota-update/{id}', [App\Http\Controllers\AnggotaController::class, 'update']);
Route::get('/list-anggota-delete/{id}', [App\Http\Controllers\AnggotaController::class, 'destroy']);
#Rencana Kegiatan
Route::get('/rencana-kegiatan', [App\Http\Controllers\RencanaController::class, 'index']);
Route::get('/rencana-kegiatan-add', [App\Http\Controllers\RencanaController::class, 'create']);
Route::post('/rencana-kegiatan-save', [App\Http\Controllers\RencanaController::class, 'store']);
Route::get('/rencana-kegiatan-edit/{id}', [App\Http\Controllers\RencanaController::class, 'edit']);
Route::post('/rencana-kegiatan-update/{id}', [App\Http\Controllers\RencanaController::class, 'update']);
Route::get('/rencana-kegiatan-delete/{id}', [App\Http\Controllers\RencanaController::class, 'destroy']);
#Daftar Kehadiran
Route::get('/daftar-hadir', [App\Http\Controllers\AbsensiController::class, 'index']);
Route::get('/daftar-hadir-add', [App\Http\Controllers\AbsensiController::class, 'create']);
Route::post('/daftar-hadir-save', [App\Http\Controllers\AbsensiController::class, 'store']);
Route::get('/daftar-hadir-edit/{id}', [App\Http\Controllers\AbsensiController::class, 'edit']);
Route::post('/daftar-hadir-update/{id}', [App\Http\Controllers\AbsensiController::class, 'update']);
Route::get('/daftar-hadir-delete/{id}', [App\Http\Controllers\AbsensiController::class, 'destroy']);
#Kegiatan Usaha
Route::get('/usaha', [App\Http\Controllers\UsahaController::class, 'index']);
Route::get('/usaha-add', [App\Http\Controllers\UsahaController::class, 'create']);
Route::post('/usaha-save', [App\Http\Controllers\UsahaController::class, 'store']);
Route::get('/usaha-edit/{id}', [App\Http\Controllers\UsahaController::class, 'edit']);
Route::post('/usaha-update/{id}', [App\Http\Controllers\UsahaController::class, 'update']);
Route::get('/usaha-delete/{id}', [App\Http\Controllers\UsahaController::class, 'destroy']);
#Notulen
Route::get('/notulen', [App\Http\Controllers\NotulenController::class, 'index']);
Route::get('/notulen-add', [App\Http\Controllers\NotulenController::class, 'create']);
Route::post('/notulen-save', [App\Http\Controllers\NotulenController::class, 'store']);
Route::get('/notulen-edit/{id}', [App\Http\Controllers\NotulenController::class, 'edit']);
Route::post('/notulen-update/{id}', [App\Http\Controllers\NotulenController::class, 'update']);
Route::get('/notulen-delete/{id}', [App\Http\Controllers\NotulenController::class, 'destroy']);