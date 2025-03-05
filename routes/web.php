<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/myprojects', function () {
    return view('profile.myprojects');
})->middleware('auth')->name('myprojects');

Route::get('/about', function () {
    return view('profile.about');
})->middleware('auth')->name('about');

Route::post('/create-folder', function (Illuminate\Http\Request $request) {
    $path = $request->input('path');
    if (!Storage::exists($path)) {
        Storage::makeDirectory($path);
        return response()->json(['success' => true]);
    }
    return response()->json(['success' => false]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('projects', ProjectController::class);

require __DIR__.'/auth.php';
