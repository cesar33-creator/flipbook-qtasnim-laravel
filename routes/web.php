<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FlipBookController;
use App\Http\Controllers\ManagementRolesController;
use App\Http\Controllers\ManagementUsersController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\UploadKaryawannControler;
use App\Http\Controllers\UploadPanduanControler;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadGeneralController;
use App\Http\Controllers\UploadBusinessController;
use App\Http\Controllers\UploadFinanceController;
use App\Http\Controllers\UploadHealthcareController;
use App\Http\Controllers\UploadHRGAController;
use App\Http\Controllers\UploadProjectServicesController;
use App\Http\Controllers\UploadPublicRelationController;
use App\Http\Controllers\UploadPustakaController;
use App\Http\Controllers\UploadResearchController;
use App\Http\Controllers\UploadSystemDesignController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/General', function () {
    return view('General.General');
});

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

// ManagementUsers Page
Route::resource('ManagementUsers', ManagementUsersController::class);
Route::get('/ManagementUsers', [ManagementUsersController::class, 'index'])->name('ManagementUsers.users');
Route::get('ManagementUsers/create', [ManagementUsersController::class, 'create'])->name('create');
Route::post('/ManagementUsers', [ManagementUsersController::class, 'store'])->name('ManagementUsers.store');
Route::get('/ManagementUsers/show', [ManagementUsersController::class, 'show'])->name('show');
Route::get('/ManagementUsers/{Name}/edit', [ManagementUsersController::class, 'edit'])->name('edit');
Route::put('/ManagementUsers/{Name}', [ManagementUsersController::class, 'update'])->name('update');
Route::delete('/ManagementUsers/{Name}', [ManagementUsersController::class, 'destroy'])->name('destroy');

// ManagementRoles Page
Route::resource('ManagementRoles', ManagementRolesController::class);
Route::get('/ManagementRoles', [ManagementRolesController::class, 'index'])->name('ManagementRoles.roles');
Route::get('ManagementRoles/create', [ManagementRolesController::class, 'create'])->name('create');
Route::post('/ManagementRoles', [ManagementRolesController::class, 'store'])->name('ManagementRoles.store');
Route::get('/ManagementRoles/show', [ManagementRolesController::class, 'show'])->name('show');
Route::get('/ManagementRoles/{id}/edit', [ManagementRolesController::class, 'edit'])->name('edit');
Route::put('/ManagementRoles/{id}', [ManagementRolesController::class, 'update'])->name('update');
Route::delete('/ManagementRoles/{id}', [ManagementRolesController::class, 'destroy'])->name('destroy');

// Flipbook
Route::get('/KodeEtik', [FlipBookController::class, 'KodeEtik'])->name('KodeEtik');
Route::get('/SOP', [FlipBookController::class, 'SOP'])->name('SOP');
Route::get('/Company', [FlipBookController::class, 'Company'])->name('Company');

// Auth
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

// //Upload Pdf & Delete BukuKhusus
Route::resource('/UploadFile', UploadFileController::class);
Route::get('/BukuKhusus', [UploadFileController::class, 'index'])->middleware('auth');    // Hanya dapat diakses oleh yang sudah login
Route::get('/BukuKhusus/{idbuku}', [UploadFileController::class, 'show'])->middleware('auth');

// Upload Pdf & Delete BukuPanduan
Route::resource('/UploadPanduan', UploadPanduanControler::class);
Route::get('/BukuPanduan', [UploadPanduanControler::class, 'index']);
Route::get('/BukuPanduan/{idbuku}', [UploadPanduanControler::class, 'show']);

// Upload Pdf & Delete BukuKaryawan
Route::resource('/UploadKaryawan', UploadKaryawannControler::class);
Route::get('/BukuKaryawan', [UploadKaryawannControler::class, 'index']);
Route::get('/BukuKaryawan/{idbuku}', [UploadKaryawannControler::class, 'show']);

// Upload Pdf & Delete Buku General
Route::resource('/UploadGeneral', UploadGeneralController::class);
Route::get('/General', [UploadGeneralController::class, 'index']);
Route::get('/General/{idbuku}', [UploadGeneralController::class, 'show']);
Route::delete('/General/{idbuku}', [UploadGeneralController::class, 'destroy'])->name('destroy');

// Upload Pdf & Delete Buku Business
Route::resource('/UploadBusiness', UploadBusinessController::class);
Route::get('/Business', [UploadBusinessController::class, 'index']);
Route::get('/Business/{idbuku}', [UploadBusinessController::class, 'show']);
Route::delete('/Business/{idbuku}', [UploadBusinessController::class, 'destroy'])->name('destroy');

// Upload Pdf & Delete Buku Finance
Route::resource('/UploadFinance', UploadFinanceController::class);
Route::get('/Finance', [UploadFinanceController::class, 'index']);
Route::get('/Finance/{idbuku}', [UploadFinanceController::class, 'show']);
Route::delete('/Finance/{idbuku}', [UploadFinanceController::class, 'destroy'])->name('destroy');

// Upload Pdf & Delete Buku Healthcare
Route::resource('/UploadHealthcare', UploadHealthcareController::class);
Route::get('/Healthcare', [UploadHealthcareController::class, 'index']);
Route::get('/Healtcare/{idbuku}', [UploadHealthcareController::class, 'show']);
Route::delete('/Healthcare/{idbuku}', [UploadHealthcareController::class, 'destroy'])->name('destroy');

// Upload Pdf & Delete Buku HRGA
Route::resource('/UploadHRGA', UploadHRGAController::class);
Route::get('/HRGA', [UploadHRGAController::class, 'index']);
Route::get('/HRGA/{idbuku}', [UploadHRGAController::class, 'show']);
Route::delete('/HRGA/{idbuku}', [UploadHRGAController::class, 'destroy'])->name('destroy');

// Upload Pdf & Delete Buku Project and Services
Route::resource('/UploadProjectServices', UploadProjectServicesController::class);
Route::get('/ProjectServices', [UploadProjectServicesController::class, 'index']);
Route::get('/ProjectServices/{idbuku}', [UploadProjectServicesController::class, 'show']);
Route::delete('/ProjectServices/{idbuku}', [UploadProjectServicesController::class, 'destroy'])->name('destroy');

// Upload Pdf & Delete Buku Public Relation
Route::resource('/UploadPublicRelation', UploadPublicRelationController::class);
Route::get('/PublicRelation', [UploadPublicRelationController::class, 'index']);
Route::get('/PublicRelation/{idbuku}', [UploadPublicRelationController::class, 'show']);
Route::delete('/PublicRelation/{idbuku}', [UploadPublicRelationController::class, 'destroy'])->name('destroy');

// Upload Pdf & Delete Buku Pustaka
Route::resource('/UploadPustaka', UploadPustakaController::class);
Route::get('/Pustaka', [UploadPustakaController::class, 'index']);
Route::get('/Pustaka/{idbuku}', [UploadPustakaController::class, 'show']);
Route::delete('/Pustaka/{idbuku}', [UploadPustakaController::class, 'destroy'])->name('destroy');

// Upload Pdf & Delete Buku Research
Route::resource('/UploadResearch', UploadResearchController::class);
Route::get('/Research', [UploadResearchController::class, 'index']);
Route::get('/Research/{idbuku}', [UploadResearchController::class, 'show']);
Route::delete('/Research/{idbuku}', [UploadResearchController::class, 'destroy'])->name('destroy');

// Upload Pdf & Delete Buku Project and Services
Route::resource('/UploadSystem', UploadSystemDesignController::class);
Route::get('/System', [UploadSystemDesignController::class, 'index']);
Route::get('/System/{idbuku}', [UploadSystemDesignController::class, 'show']);
Route::delete('/System/{idbuku}', [UploadSystemDesignController::class, 'destroy'])->name('destroy');

//User Activity
Route::get('/UserActivity', [UserActivityController::class, 'index']);