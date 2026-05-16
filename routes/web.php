<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
    $posts = \App\Models\Post::where('is_published', true)->orderBy('created_at', 'desc')->take(3)->get();
    $galleries = \App\Models\Gallery::orderBy('created_at', 'desc')->take(6)->get();

    return view('welcome', compact('settings', 'posts', 'galleries'));
});

Route::get('/projects', function () {
    return view('projects.index');
})->name('projects.index');

Route::get('/projects/{slug}', function (string $slug) {
    return view('projects.show', ['slug' => $slug]);
})->name('projects.show');

Route::get('/blog/{slug}', function (string $slug) {
    $post = \App\Models\Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
    return view('blog.show', compact('post'));
})->name('blog.show');

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
