<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\RentalExportController;
use App\Http\Middleware\EnsureAdminAuthenticated;
use App\Http\Middleware\EnsureUserAuthenticated;
use App\Http\Controllers\Admin\UserController;

// User routes
Route::get('/user/login', [UserAuthController::class, 'showLogin'])->name('user.login');
Route::post('/user/login', [UserAuthController::class, 'login']);
Route::get('/user/register', [UserAuthController::class, 'showRegister'])->name('user.register');
Route::post('/user/register', [UserAuthController::class, 'register']);
Route::post('/user/logout', [UserAuthController::class, 'logout'])->name('user.logout');

// midleware untuk user
Route::middleware([EnsureUserAuthenticated::class])->group(function () {
    Route::get('/user/home', [RentalController::class, 'home'])->name('user.home');

    // Route status (HARUS duluan)
    // ...existing code...

    // Resource rentals tanpa show
    Route::resource('rentals', RentalController::class)->except(['show']);
    
});


// Admin authentication routes
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::get('/admin/register', [AdminAuthController::class, 'showRegister'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


// Routes protected by admin auth middleware with 'admin' prefix and 'admin.' route name prefix
Route::middleware([EnsureAdminAuthenticated::class]) // ✅ Yang ini dipakai
     ->prefix('admin')
     ->name('admin.')
     ->group(function () {
         // Dashboard
         Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

         // Approvals routes
         Route::get('/approvals', [ApprovalController::class, 'index'])->name('approvals.index');
         Route::post('/approvals/{id}/approve', [ApprovalController::class, 'approve'])->name('approvals.approve');
         Route::post('/approvals/{id}/reject', [ApprovalController::class, 'reject'])->name('approvals.reject');
         Route::get('/returns', [ReturnController::class, 'adminIndex'])->name('return.index');

         // Resource kelola user pegawai
         Route::resource('user', App\Http\Controllers\Admin\UserController::class)->only(['index', 'destroy']);
         Route::post('user/{id}/promote', [App\Http\Controllers\Admin\UserController::class, 'promote'])->name('user.promote');
     });
      // Vehicle resource routes under admin prefix
      Route::resource('vehicles', \App\Http\Controllers\VehicleController::class);
    // Route khusus status (PENTING)


// Resource route TANPA show (PENTING)


Route::middleware('auth')->group(function () {
    // Versi lama: Pengembalian langsung untuk rental tertentu
    Route::get('/rentals/{rental}/return', [ReturnController::class, 'showReturnForm'])->name('rentals.return.form');
    Route::post('/rentals/{rental}/return', [ReturnController::class, 'returnCar'])->name('rentals.return');

    // Versi baru: Pengembalian dengan memilih kendaraan
    Route::get('/return', [ReturnController::class, 'showReturnForm'])->name('rentals.return.selection.form');
    Route::post('/return', [ReturnController::class, 'returnCar'])->name('rentals.return.selection');
});



// daftar peminjamamn
Route::get('/admin/rentals', [RentalController::class, 'daftarpeminjaman'])->name('admin.daftarpeminjaman.index');
// export excel
Route::get('/admin/rentals/export', [RentalExportController::class, 'export'])->name('rentals.export.excel');

// ...existing code...
// ...existing code...
Route::get('/admin/daftarpeminjaman', [RentalController::class, 'daftarpeminjaman'])->name('admin.daftarpeminjaman');
Route::delete('/admin/daftarpeminjaman/delete-all', [RentalController::class, 'deleteAll'])->name('rentals.delete.all');
Route::delete('/admin/daftarpeminjaman/delete-selected', [RentalController::class, 'deleteSelected'])->name('rentals.delete.selected');
// ...existing code...
Route::get('/admin/daftarpeminjaman/{id}', [App\Http\Controllers\RentalController::class, 'show'])->name('admin.daftarpeminjaman.show');
Route::get('/admin/audit', [App\Http\Controllers\Admin\AuditController::class, 'index'])->name('admin.audit.index');
Route::get('/admin/log-aktivitas', [\App\Http\Controllers\Admin\AuditController::class, 'logAktivitas'])->name('admin.logaktivitas');

Route::middleware(['web', 'App\Http\Middleware\EnsureAdminAuthenticated'])->group(function () {
    Route::get('/admin/profile', [UserController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/password/update', [UserController::class, 'updatePassword'])->name('admin.password.update');
    Route::post('/admin/biodata/update', [UserController::class, 'updateBiodata'])->name('admin.biodata.update');
});

// Profile routes for user
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/password', [\App\Http\Controllers\ProfileController::class, 'editPassword'])->name('profile.password.edit');
    Route::patch('/profile/password', [\App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.password.update');
});

// Lupa sandi user (reset password)
Route::get('/user/password/reset', [App\Http\Controllers\Auth\UserPasswordResetController::class, 'requestForm'])->name('user.password.request');
Route::post('/user/password/email', [App\Http\Controllers\Auth\UserPasswordResetController::class, 'sendResetLink'])->name('user.password.email');
Route::get('/user/password/reset/{token}', [App\Http\Controllers\Auth\UserPasswordResetController::class, 'resetForm'])->name('password.reset');
Route::post('/user/password/reset', [App\Http\Controllers\Auth\UserPasswordResetController::class, 'resetPassword'])->name('user.password.update');
// Lupa sandi admin (reset password)
Route::get('/admin/password/reset', [App\Http\Controllers\Auth\AdminPasswordResetController::class, 'requestForm'])->name('admin.password.request');
Route::post('/admin/password/email', [App\Http\Controllers\Auth\AdminPasswordResetController::class, 'sendResetLink'])->name('admin.password.email');
Route::get('/admin/password/reset/{token}', [App\Http\Controllers\Auth\AdminPasswordResetController::class, 'resetForm'])->name('admin.password.reset');
Route::post('/admin/password/reset', [App\Http\Controllers\Auth\AdminPasswordResetController::class, 'resetPassword'])->name('admin.password.reset.update');