<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LaporanPublikController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Berikan akses ke halaman ini hanya jika sudah login
Route::get('/home', function () {
    return view('home');
})->middleware('auth');

// Route untuk menampilkan dashboard pengguna
Route::get('/dashboard', [AuthController::class, 'showDashboard'])->middleware('auth')->name('dashboard');

// Route untuk menyimpan laporan
Route::post('/report', [ReportController::class, 'store'])->name('report.store');

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', function () {
    Auth::logout(); // Logout pengguna
    return redirect('/'); // Arahkan ke halaman beranda
})->name('logout');


Route::post('/login', [Auth\LoginController::class, 'login'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Rute untuk login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

// Rute untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::post('/report/store', [ReportController::class, 'store'])->name('report.store');
Route::get('/register/admin', [RegisterController::class, 'showAdminRegistrationForm'])->name('register.admin');
Route::post('/register/admin', [RegisterController::class, 'registerAdmin']);

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/laporanpublik', [LaporanPublikController::class, 'index'])->name('laporanpublik.index');