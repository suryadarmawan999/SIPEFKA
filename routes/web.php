<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FacilityCategoryController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\TindakLanjutController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidationController;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Complaints routes
    Route::resource('complaints', ComplaintController::class);
    Route::get('/complaints/{id}/export-pdf', [ComplaintController::class, 'exportPdf'])->name('complaints.export-pdf');

    // Facilities routes
    Route::resource('facilities', FacilityController::class);
    Route::get('/facilities/export/pdf', [FacilityController::class, 'exportPdf'])->name('facilities.export-pdf');
    Route::get('/facilities/export/excel', [FacilityController::class, 'exportExcel'])->name('facilities.export-excel');

    // Facility Categories routes
    Route::resource('facility-categories', FacilityCategoryController::class);

    // Monitoring routes
    Route::get('/monitoring', [MonitoringController::class, 'index'])->name('monitoring.index');
    Route::get('/monitoring/{id}', [MonitoringController::class, 'show'])->name('monitoring.show');
    Route::get('/monitoring/export/pdf', [MonitoringController::class, 'exportPdf'])->name('monitoring.export-pdf');

    // Tindak Lanjut routes
    Route::resource('tindak-lanjut', TindakLanjutController::class);

    // Reports routes
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/export/pdf', [ReportController::class, 'exportPdf'])->name('reports.export-pdf');
    Route::get('/reports/export/excel', [ReportController::class, 'exportExcel'])->name('reports.export-excel');

    // Users routes (Admin only)
    Route::middleware(['role:Admin'])->group(function () {
        Route::resource('users', UserController::class);
        Route::get('/users/export/pdf', [UserController::class, 'exportPdf'])->name('users.export-pdf');
        Route::get('/users/export/excel', [UserController::class, 'exportExcel'])->name('users.export-excel');
    });

    // Validation routes (Admin only)
    Route::middleware(['role:Admin'])->group(function () {
        Route::get('/validation', [ValidationController::class, 'index'])->name('validation.index');
        Route::get('/validation/{id}', [ValidationController::class, 'show'])->name('validation.show');
        Route::post('/validation/{id}/validate', [ValidationController::class, 'validateComplaint'])->name('validation.validate');
    });

    // API routes for wilayah Indonesia
    Route::get('/api/wilayah/provinces', function () {
        $service = app(\App\Http\Services\WilayahIndonesiaService::class);
        return response()->json($service->getProvinces());
    })->name('api.wilayah.provinces');

    Route::get('/api/wilayah/regencies/{provinceId}', function ($provinceId) {
        $service = app(\App\Http\Services\WilayahIndonesiaService::class);
        return response()->json($service->getRegencies($provinceId));
    })->name('api.wilayah.regencies');

    Route::get('/api/wilayah/districts/{regencyId}', function ($regencyId) {
        $service = app(\App\Http\Services\WilayahIndonesiaService::class);
        return response()->json($service->getDistricts($regencyId));
    })->name('api.wilayah.districts');
});
