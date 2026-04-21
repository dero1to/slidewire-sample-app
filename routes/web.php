<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $slides = [
        ['title' => 'SlideWire 入門ガイド', 'url' => '/slides/hello', 'path' => 'demo/hello'],
        ['title' => 'SlideWire 紹介 LT', 'url' => '/slides/slidewire', 'path' => 'my-section/slidewire'],
    ];

    return view('welcome', compact('slides'));
})->name('home');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::view('dashboard', 'dashboard')->name('dashboard');
// });

Route::slidewire('/slides/hello', 'demo/hello');
Route::slidewire('/slides/slidewire', 'my-section/slidewire');

Route::get('/react', fn () => view('react'))->name('react');

Route::post('/react/send', function (Request $request) {
    $emoji = $request->validate([
        'emoji' => 'required|string|in:clap,heart,tada',
    ])['emoji'];

    $reactions = Cache::get('lt.reactions', []);
    $reactions[] = ['emoji' => $emoji, 'at' => (int) (microtime(true) * 1000)];
    $reactions = array_slice($reactions, -200);
    Cache::put('lt.reactions', $reactions, now()->addHour());

    return response()->noContent();
});

Route::get('/react/recent', function (Request $request) {
    $since = (int) $request->query('since', 0);
    $reactions = Cache::get('lt.reactions', []);
    $recent = array_values(array_filter($reactions, fn ($r) => $r['at'] > $since));

    return response()->json([
        'reactions' => $recent,
        'now' => (int) (microtime(true) * 1000),
    ]);
});

require __DIR__.'/settings.php';
