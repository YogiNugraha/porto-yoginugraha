<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', function () {
    return view('projects.index');
})->name('projects.index');

Route::get('/projects/{slug}', function (string $slug) {
    return view('projects.show', ['slug' => $slug]);
})->name('projects.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('admin/posts', \App\Http\Controllers\PostController::class);
    Route::resource('admin/galleries', \App\Http\Controllers\GalleryController::class);
    Route::resource('admin/pages', \App\Http\Controllers\PageController::class);
    Route::resource('admin/navigations', \App\Http\Controllers\NavigationController::class);
    Route::resource('admin/settings', \App\Http\Controllers\SettingController::class);
});

require __DIR__.'/auth.php';
