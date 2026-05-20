<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/paket', function () {
    return view('pages.paket');
})->name('paket');

Route::get('/galeri', function () {
    return view('pages.galeri', ['galeri' => []]);
})->name('galeri');

Route::get('/pesan', [PesananController::class, 'index'])->name('pesan.index');
Route::post('/pesan', [PesananController::class, 'store'])->name('pesan.store');
Route::get('/pesan/sukses', [PesananController::class, 'sukses'])->name('pesan.sukses');

// ADMIN ROUTES
Route::get('/admin', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/masuk', [AdminController::class, 'masuk'])->name('admin.masuk');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/pesanan/{id}', [AdminController::class, 'detail'])->name('admin.detail');
Route::post('/admin/pesanan/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.status');
Route::delete('/admin/pesanan/{id}/hapus', [AdminController::class, 'hapus'])->name('admin.hapus');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
