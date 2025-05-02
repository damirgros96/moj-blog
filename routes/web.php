<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PageController;


Livewire::setScriptRoute(function ($handle) {
return Route::get('/moj-blog/public/livewire/livewire.js', $handle);
});

Livewire::setUpdateRoute(function ($handle) {
return Route::post('/moj-blog/public/livewire/update', $handle);
});


Route::resource('posts', PostController::class);

Route::get('/', [PhotoController::class, 'index'])->name('home');
Route::get('/videos', [VideoController::class, 'videos'])->name('videos');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/photo-detail', [PageController::class, 'photoDetail'])->name('photo-detail');
Route::get('/video-detail', [PageController::class, 'videoDetail'])->name('video-detail');