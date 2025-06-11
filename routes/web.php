<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\HealthRecordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Login page
Route::get('/login', function () {
    return view('login'); // Make sure resources/views/login.blade.php exists
})->name('login');

// Google OAuth routes
Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('auth.google.callback');

// Dashboard route - protected by auth middleware
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Health Records routes - protected by auth middleware
Route::get('/health-records/count-today', [HealthRecordController::class, 'countToday'])->middleware('auth');
Route::get('/health-records/count-total', [HealthRecordController::class, 'countTotal'])->middleware('auth');

Route::get('/health-records', [HealthRecordController::class, 'index'])->middleware('auth')->name('health.records');

Route::get('/health-records/create', [HealthRecordController::class, 'create'])->middleware('auth')->name('health.records.create');
Route::post('/health-records', [HealthRecordController::class, 'store'])->name('health.records.store');

Route::get('/health-records/{id}', [HealthRecordController::class, 'show'])->middleware('auth')->name('health.records.show');

// Edit Records
Route::put('/health-records/{id}', [HealthRecordController::class, 'update'])->name('health.records.update');


// Prediction Model - protected by auth middleware
Route::get('/prediction-model', function () {
    return view('prediction_model'); // Make sure this blade exists
})->middleware('auth')->name('prediction.model');

// Reports - protected by auth middleware
Route::get('/reports', function () {
    return view('reports'); // Make sure this blade exists
})->middleware('auth')->name('reports');

Route::get('/reports', [ReportController::class, 'report'])->name('reports');

// Delete record
Route::delete('/health-records/{id}', [HealthRecordController::class, 'destroy'])->name('health-records.destroy');



// Logout route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->middleware('auth')->name('logout');


Route::get('/debug-record', function () {
    return App\Models\HealthRecord::latest()->first();
});

use Illuminate\Support\Facades\Schema;
Route::get('/debug-columns', function () {
    return Schema::getColumnListing('health_records');
});

Route::get('/test-speed', function () {
    return 'Quick response!';
});
