<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Components\Feed;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     Auth::loginUsingId(1);
//     return view('welcome');
// });

Route::get('/feed', Feed::class)->name('feed');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
