<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\PostController;


Livewire::setScriptRoute(function ($handle) {
return Route::get('/moj-blog/public/livewire/livewire.js', $handle);
});

Livewire::setUpdateRoute(function ($handle) {
return Route::post('/moj-blog/public/livewire/update', $handle);
});

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);
