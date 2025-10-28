<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/student-data', [AdminController::class, 'studentData'])->name('admin.studentdata');
    Route::put('/admin/reports/{report}', [AdminController::class, 'update'])->name('admin.reports.update');
    Route::delete('/admin/reports/{report}', [AdminController::class, 'destroy'])->name('admin.reports.destroy');
});

Route::middleware(['auth', 'verified', 'role:student'])->group(function () {
    Route::get('/student', [StudentController::class, 'index'])->name('student.dashboard');
    Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student', [StudentController::class, 'store'])->name('student.store');
});

// Siswa-only routes
Route::middleware(['auth', 'verified', 'role:student'])->group(function () {
    Route::get('/student', function () {
        return view('student.dashboard');
    })->name('student.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
