<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LaporanPublikController;
use App\Http\Controllers\LaporanPrivatesController;
use App\Http\Controllers\SeluruhLaporanController;
use App\Http\Controllers\VerifikasiLaporanController;
use App\Http\Controllers\LaporanDiprosesController;
use App\Http\Controllers\LaporanSelesaiController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\RegisterController;

// routes/web.php
Route::get('/user-count', [UserController::class, 'userCount']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
// This should be included in your routes file for password reset functionality
Route::middleware(['web'])->group(function () {
    Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
});

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

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
    Auth::logout();
    return redirect('/');
})->name('logout.get');

// Rute untuk login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

// Rute untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Route untuk register admin
Route::get('/register/admin', [RegisterController::class, 'showAdminRegistrationForm'])->name('register.admin');
Route::post('/register/admin', [RegisterController::class, 'registerAdmin']);

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

// Route laporan publik
Route::get('/laporanpublik', [LaporanPublikController::class, 'index'])->name('laporanpublik.index');
Route::get('/laporan-publik', [ReportController::class, 'index'])->name('laporan-publik.index'); // Ganti nama route untuk laporan publik

// Rute admin seluruh laporan
Route::get('/admin/seluruh-laporan', [SeluruhLaporanController::class, 'index'])->name('admin.seluruh_laporan');
Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');
Route::get('/reports/{id}/edit', [ReportController::class, 'edit'])->name('reports.edit');
Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::resource('reports', ReportController::class);

// Route to update status
Route::post('/reports/{id}/update-status', [ReportController::class, 'updateStatus'])->name('reports.updateStatus');

// Other routes for viewing and deleting
Route::delete('/reports/{id}', [ReportController::class, 'destroy'])->name('reports.delete');
Route::get('/reports/verify/{id}', [ReportController::class, 'verify'])->name('reports.verify');

// Rute admin laporan diproses
Route::get('/laporan-diproses', [LaporanDiprosesController::class, 'diproses'])->name('laporan.diproses');
Route::get('/laporan-diproses', [ReportController::class, 'diproses'])->name('admin.laporan-diproses');

// Rute admin verifikasi laporan
Route::get('verifikasi-laporan', [VerifikasiLaporanController::class, 'index'])->name('verifikasi.laporan.index');
Route::post('verifikasi-laporan/verifikasi/{id}', [VerifikasiLaporanController::class, 'verifikasi'])->name('verifikasi.laporan.verifikasi');
Route::delete('verifikasi-laporan/hapus/{id}', [VerifikasiLaporanController::class, 'hapus'])->name('verifikasi.laporan.hapus');

// Rute admin laporan selesai
// Route::get('/admin/laporan-selesai', [ReportController::class, 'laporanSelesai'])->name('admin.laporan-selesai');
// Route::get('/admin/laporan-selesai', [AdminController::class, 'laporanSelesai'])->name('admin.laporan-selesai');
// Route::get('/admin/laporan-selesai', [LaporanSelesaiController::class, 'index'])->name('laporan-selesai.index');
// Route::get('/admin/laporan-selesai', [LaporanSelesaiController::class, 'index'])->name('laporan.selesai');
// Route::get('/admin/laporan-selesai/{id}/selesai', [LaporanSelesaiController::class, 'selesai'])->name('laporan-selesai.selesai');
// Route::get('/admin/laporan-selesai/{id}/hapus', [LaporanSelesaiController::class, 'hapus'])->name('laporan-selesai.hapus');
// Route::get('/laporan-selesai', [ReportController::class, 'laporanSelesai'])->name('laporan_selesai');
// Rute untuk halaman Laporan Selesai
Route::get('/admin/laporan-selesai', [LaporanSelesaiController::class, 'index'])->name('admin.laporan-selesai');

// Rute untuk tindakan selesai dan hapus dengan parameter ID
Route::get('/admin/laporan-selesai/{id}/selesai', [LaporanSelesaiController::class, 'selesai'])->name('admin.laporan-selesai.selesai');
Route::get('/admin/laporan-selesai/{id}/hapus', [LaporanSelesaiController::class, 'hapus'])->name('admin.laporan-selesai.hapus');

Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda.index');

// Laporan private
Route::get('/laporan-privates', [LaporanPrivatesController::class, 'index'])->name('laporan-privates.index');
Route::get('/laporan-privates/{id}', [LaporanPrivatesController::class, 'show'])->name('laporan-privates.show'); // This is for private reports
Route::delete('/laporan-privates/{id}', [LaporanPrivatesController::class, 'destroy'])->name('laporan-privates.destroy');

// Menampilkan laporan berdasarkan status
Route::get('/reports/all', [ReportController::class, 'showAllReports'])->name('reports.all');
Route::get('/reports/verified', [ReportController::class, 'showVerifiedReports'])->name('reports.verified');
Route::get('/reports/in-process', [ReportController::class, 'showInProcessReports'])->name('reports.inProcess');
Route::get('/reports/completed', [ReportController::class, 'showCompletedReports'])->name('reports.completed');

// Rute laporan terverifikasi
// Route::get('/admin/laporan-terverifikasi', [ReportController::class, 'terverifikasi'])->name('/admin/laporan-terverifikasi');
// Route::get('/admin/laporan-terverifikasi', [AdminController::class, 'showLaporanTerverifikasi'])->name('admin.laporan-terverifikasi');
Route::get('/admin/laporan-terverifikasi', [AdminController::class, 'showLaporanTerverifikasi'])
    ->name('admin.laporan-terverifikasi');  // Make sure to name the route
// Route untuk memperbarui status laporan
Route::post('/reports/{id}/update-status/{newStatus}', [ReportController::class, 'updateStatus'])->name('reports.updateStatus');
Route::patch('/reports/{id}/update-status/{newStatus}', [ReportController::class, 'updateStatus'])->name('reports.updateStatus');

// Routes untuk laporan privates
Route::get('/laporan_privates', [LaporanPrivatesController::class, 'index'])->name('laporan_privates.index');
Route::get('/laporan_privates', [LaporanPrivatesController::class, 'index']);
Route::get('/laporan_privates', [ReportController::class, 'showPublicReports'])->name('laporan_privates');

// Routes untuk laporan publik
Route::get('/laporanpublik', [LaporanPublikController::class, 'index'])->name('laporanpublik.index'); 

// Route::get('/laporan-publik', [ReportController::class, 'indexPublik'])->name('laporan_publik.index');
// Route::get('/laporan-privat', [ReportController::class, 'indexPrivat'])->name('laporan_privates.index');
Route::get('/laporanpublik', [LaporanPublikController::class, 'index']);
Route::get('/laporanpublik', [ReportController::class, 'showPublicReports'])->name('laporanpublik');
