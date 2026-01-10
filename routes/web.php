<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RateController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\CertificationController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/projects/{slug}', [ProjectController::class, 'show'])
     ->name('projects.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', fn () => view('admin.dashboard'));

        Route::resource('projects', App\Http\Controllers\Admin\ProjectController::class);
        Route::resource('rates', App\Http\Controllers\Admin\RateController::class);
        Route::resource('certifications', CertificationController::class)->except(['show']);
    });

require __DIR__.'/auth.php';
