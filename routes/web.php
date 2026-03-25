<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $slides = [
        ['title' => 'SlideWire 入門ガイド', 'url' => '/slides/hello', 'path' => 'demo/hello'],
    ];

    return view('welcome', compact('slides'));
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::slidewire('/slides/hello', 'demo/hello');

require __DIR__.'/settings.php';
