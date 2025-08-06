<?php

use App\Http\Controllers\anggotaController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\managePinjamanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\usersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [BookController::class, 'dashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('users', usersController::class);

// route::put('/books/{id}', [bookController::class, 'update'])->name('books.update');

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::resource('books', bookController::class);
    Route::resource('users', usersController::class);
    Route::get('/loanHistory', [managePinjamanController::class, 'loanHistory'])->name('managepinjaman.loanHistory');
    Route::post('/pinjam/perpanjang/{pinjam}', [managePinjamanController::class, 'perpanjangTanggal'])->name('managepinjaman.perpanjang');
    Route::patch('/pinjam/kembalikanpaksa/{id}', [managePinjamanController::class, 'kembalikanPaksa'])->name('managepinjaman.kembalikanpaksa');
});

route::group(['middleware' => ['auth', 'role:anggota']], function () {
    route::resource('anggota', anggotaController::class);   

    Route::get('pinjaman', [anggotaController::class, 'pinjaman'])->name('anggota.pinjaman');
    Route::put('kembalikanBuku/{pinjam}', [anggotaController::class, 'kembalikanBuku'])->name('anggota.kembalikan');
});

require __DIR__.'/auth.php';
