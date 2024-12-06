<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    // Routes for admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    });

    // Routes for petugas
    Route::middleware('role:petugas')->group(function () {
        Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.dashboard');
    });
});

require __DIR__.'/auth.php';
