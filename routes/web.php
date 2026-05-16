<?php

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
