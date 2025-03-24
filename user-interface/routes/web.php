<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\QuestionController;

Route::get('/questions', [QuestionController::class, 'index']);



// Public Route
Route::get('/', function () {
    return view('welcome');
});

// Authenticated Routes (Requires Login & Verification)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::get('/test/start', function () {
        return view('test.start');
    })->name('test.start');

    Route::resource('test', TestController::class);
    Route::post('/test/store', [TestController::class, 'store'])->name('test.store');
    Route::get('/test', [TestController::class, 'index'])->name('test.index');
    Route::get('/test/start', [TestController::class, 'start'])->name('test.start');

    Route::resource('patienst', PatientController::class);
    Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');

    Route::resource('reports', ReportController::class);
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

Route::post('/submit-response', [ResponseController::class, 'store'])->name('submit.response');



    
    

    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});


// Authentication Routes
require __DIR__.'/auth.php';
