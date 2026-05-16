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
    $projects = \App\Models\Project::where('is_published', true)->orderBy('order')->latest()->get();
    return view('projects.index', compact('projects'));
})->name('public.projects.index');

Route::get('/projects/{slug}', function (string $slug) {
    $project = \App\Models\Project::where('slug', $slug)->where('is_published', true)->firstOrFail();
    return view('projects.show', compact('project'));
})->name('public.projects.show');

Route::get('/blog/{slug}', function (string $slug) {
    $post = \App\Models\Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
    return view('blog.show', compact('post'));
})->name('blog.show');

Route::get('/dashboard', function () {
    $stats = [
        'posts' => \App\Models\Post::count(),
        'projects' => \App\Models\Project::count(),
        'galleries' => \App\Models\Gallery::count(),
        'experiences' => \App\Models\Experience::count(),
        'skills' => \App\Models\Skill::count(),
    ];
    
    $recentPosts = \App\Models\Post::latest()->take(5)->get();
    $recentProjects = \App\Models\Project::latest()->take(5)->get();

    return view('dashboard', compact('stats', 'recentPosts', 'recentProjects'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('admin/posts', \App\Http\Controllers\PostController::class);
    Route::resource('admin/projects', \App\Http\Controllers\ProjectController::class);
    Route::resource('admin/skills', \App\Http\Controllers\SkillController::class);
    Route::resource('admin/galleries', \App\Http\Controllers\GalleryController::class);
    Route::resource('admin/experiences', \App\Http\Controllers\ExperienceController::class);
    Route::resource('admin/navigations', \App\Http\Controllers\NavigationController::class);
    
    Route::get('admin/settings', [\App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');
    Route::post('admin/settings', [\App\Http\Controllers\SettingController::class, 'store'])->name('settings.store');
});

require __DIR__.'/auth.php';
