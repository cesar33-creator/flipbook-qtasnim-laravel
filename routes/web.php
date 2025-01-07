<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FlipBookController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\UploadKaryawannControler;
use App\Http\Controllers\UploadPanduanControler;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

// Halaman utama
Route::get('/', function () {
    return view('welcome', ['title' => 'Aplikasi FlipBook<br>PT QTasnim Digital Teknologi']);
});

// Halaman login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Halaman dashboard biasa (dapat diakses oleh semua orang)
Route::get('dashboard', function () {
    return view('dashboard');
});

// Halaman dashboard Khusus (dilindungi oleh middleware)
Route::get('dashboardKhusus', function () {
    return view('dashboardKhusus');
})->middleware('auth'); // Hanya dapat diakses oleh yang sudah login

// Halaman BukuKhusus Login (dilindungi oleh middleware)
Route::get('/BukuKhusus', function () {
    return view('BukuKhusus.BukuKhusus');
});

// Halaman Buku Panduan (dapat diakses oleh semua orang)
Route::get('/BukuPanduan', function () {
    return view('BukuPanduan.BukuPanduan');
});

// Halaman Buku Karyawan (dapat diakses oleh semua orang)
Route::get('/BukuKaryawan', function () {
    return view('BukuKaryawan.BukuKaryawan');
});

// Flipbook
Route::get('/KodeEtik', [FlipBookController::class, 'KodeEtik'])->name('KodeEtik');
Route::get('/SOP', [FlipBookController::class, 'SOP'])->name('SOP');
Route::get('/Company', [FlipBookController::class, 'Company'])->name('Company');

// Auth
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/store', [AuthController::class, 'storeregis']);
   // //Upload Pdf & Delete BukuKhusus
Route::resource('/UploadFile', UploadFileController::class);
Route::get('/BukuKhusus', [UploadFileController::class, 'index'])->middleware('auth');    // Hanya dapat diakses oleh yang sudah login
Route::get('/BukuKhusus/{id}', [UploadFileController::class, 'show']);

// //Upload Pdf & Delete BukuPanduan
Route::resource('/UploadPanduan', UploadPanduanControler::class);
Route::get('/BukuPanduan', [UploadPanduanControler::class, 'index']);
Route::get('/BukuPanduan/{id}', [UploadPanduanControler::class, 'show']);

// //Upload Pdf & Delete BukuKaryawan
Route::resource('/UploadKaryawan', UploadKaryawannControler::class);
Route::get('/BukuKaryawan', [UploadKaryawannControler::class, 'index']);
Route::get('/BukuKaryawan/{id}', [UploadKaryawannControler::class, 'show']);