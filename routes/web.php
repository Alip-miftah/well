<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('admin.siswa.register');
});

Route::get( 'siswa/tampil', [SiswaController::class, 'tampil'])->name('siswa.tampil');
Route::get( 'siswa/tambah', [SiswaController::class, 'tambah'])->name('siswa.tambah');
Route::post('siswa/submit', [SiswaController::class, 'submit'])->name('siswa.submit');
Route::get('siswa/edit/{id}',  [SiswaController::class, 'edit'])->name('siswa.edit');
Route::post('siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::get('siswa/delete/{id}', [SiswaController::class, 'delete'])->name('siswa.delete');

// Route untuk register
Route::get('admin/siswa/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('admin/register/store', [RegisterController::class, 'store'])->name('register.store');


// Route untuk login
Route::get('admin/siswa/login', [LoginController::class, 'index'])->name('login.index');
Route::post('admin/siswa/login', [LoginController::class, 'check_login'])->name('login.check');

