<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;


Livewire::setScriptRoute(function ($handle) {
return Route::get('/moj-blog/public/livewire/livewire.js', $handle);
});

Livewire::setUpdateRoute(function ($handle) {
return Route::post('/moj-blog/public/livewire/update', $handle);
});


Route::resource('posts', PostController::class);

Route::get('/', [PageController::class, 'posts'])->name('home');
Route::get('/photos', [PageController::class, 'photos'])->name('photos');
Route::get('/videos', [PageController::class, 'videos'])->name('videos');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/photo-detail', [PageController::class, 'photosDetail'])->name('photo-detail');
Route::get('/video-detail', [PageController::class, 'videosDetail'])->name('video-detail');
Route::get('/post-detail/{id}', [PageController::class, 'postsDetail'])->name('posts-detail');

