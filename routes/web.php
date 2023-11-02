<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

// Nama    : Muhammad Kafaby
// NIM     : 6706220149
// Kelas   : 4603

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 
    Route::post('/userStore', [RegisteredUserController::class, 'store'])->name('user.store');
    Route::get('/user', [UserController::class, 'index'])->name('user.daftarPengguna');
    Route::get('/userRegistration', [UserController::class, 'create'])->name('user.registrasi');
    Route::get('/userView/{username}', [UserController::class, 'showUser'])->name('user.infoPengguna');
    Route::put('/userUpdate/{username}', [UserController::class, 'update'])->name('user.update');
    Route::get('/userUpdate/{username}', [UserController::class, 'edit'])->name('user.editPengguna');

    Route::post('/koleksiStore', [KoleksiController::class, 'store'])->name('koleksi.store');
    Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi.daftarKoleksi');
    Route::get('/koleksiTambah', [KoleksiController::class, 'create'])->name('koleksi.registrasi');
    Route::get('/koleksiView/{id}', [KoleksiController::class, 'show'])->name('koleksi.infoKoleksi');
    Route::put('/koleksiUpdate/{id}', [KoleksiController::class, 'update'])->name('koleksi.update');
    Route::get('/koleksiUpdate/{id}', [KoleksiController::class, 'edit'])->name('koleksi.editKoleksi');

    Route::post('/transaksiStore', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.daftarTransaksi');
    Route::get('/transaksiTambah', [TransaksiController::class, 'create'])->name('transaksi.registrasi');
    Route::get('/transaksiView/{id}', [TransaksiController::class, 'show'])->name('transaksi.infoTransaksi');
    Route::put('/transaksiUpdate/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::get('/transaksiUpdate/{id}', [TransaksiController::class, 'edit'])->name('transaksi.editTransaksi');
});
 
// Route::get('/users', [UsersController::class, 'index'])->name('users.index');

require __DIR__.'/auth.php';

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');