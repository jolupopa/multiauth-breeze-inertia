<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionAdminController;

Route::middleware('guest')->group(function () {
	Route::get('admin/login', [AuthenticatedSessionAdminController::class, 'create']);
	Route::post('admin/login', [AuthenticatedSessionAdminController::class, 'store'])->name('admin.login');
});

// Route::get('admin/dashboard', function () {
// 	return Inertia::render('DashboardAdmin');
// })->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

Route::middleware('auth:admin')->group(function () {

	Route::get('admin/dashboard', function () {
		return Inertia::render('DashboardAdmin');
	})->name('admin.dashboard');

	Route::post('logout', [AuthenticatedSessionAdminController::class, 'destroy'])
	->name('admin.logout');

});