<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\McController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

// Routes untuk login dan register, hanya bisa diakses oleh guest
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
// Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');

// Routes untuk autentikasi dan registrasi
Route::post('/sesi', [AuthController::class, 'sesi'])->name('sesi');
Route::post('/store', [AuthController::class, 'store'])->name('store');

// Redirect ke halaman admin jika sudah login
Route::get('/home', function () {
    return redirect()->route('admin');
})->middleware('auth');

// Route untuk halaman admin, hanya bisa diakses oleh pengguna yang sudah autentikasi
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth');
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai')->middleware('auth');

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Route untuk pengelolaan gaji, hanya bisa diakses oleh admin yang sudah login
Route::get('/gaji', [AdminController::class, 'gaji'])->name('gaji')->middleware('auth');
Route::get('/gaji/create', [AdminController::class, 'gajiCreate'])->name('gaji.create')->middleware('auth');
Route::post('/create-gaji', [AdminController::class, 'addGaji'])->name('create-gaji')->middleware('auth');
Route::post('/gaji/hapus/{id}', [AdminController::class, 'hapusGaji'])->name('delete-gaji')->middleware('auth');

// Routes untuk pengelolaan master control (gaji) di McController, hanya bisa diakses oleh admin yang sudah login
Route::post('/tambahmcreq', [McController::class, 'tambahReq'])->name('tambahReq')->middleware('auth');
Route::post('/editmcreq', [McController::class, 'editReq'])->name('editReq')->middleware('auth');
Route::post('/mchapus', [McController::class, 'hapus'])->name('hapus')->middleware('auth');

// Route untuk edit gaji berdasarkan ID, menggunakan metode PUT untuk update
Route::get('/gaji/{id}', [AdminController::class, 'gajiEdit'])->middleware('auth');
Route::put('/gaji/{id}', [AdminController::class, 'update'])->name('update-gaji');

// Route untuk cetak data gaji
Route::get('/cetak', [AdminController::class, 'cetak'])->name('gaji.cetak');
Route::get('/cetak-aagaji', [AdminController::class, 'cetakGaji'])->name('cetak.gaji');

// Route untuk halaman master control dan pengelolaan gaji oleh McController
Route::get('/mastercontrol', [McController::class, 'mastercontrol'])->name('mastercontrol')->middleware('auth');
Route::get('/gaji-create', [McController::class, 'create'])->name('create')->middleware('auth');
Route::get('/mcedit/{id}', [McController::class, 'edit'])->name('mcedit')->middleware('auth');

// Route untuk cetak slip gaji personal
Route::post('/gaji/cetak-personal', [AdminController::class, 'cetakPersonal'])->name('gaji.cetak-personal');
