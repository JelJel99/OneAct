<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\IndexController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return 'Test route works';
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);

    Route::get('/users', [AdminController::class, 'users']);
    Route::post('/users/{id}/suspend', [AdminController::class, 'suspendUser']);
    Route::post('/users/{id}/unsuspend', [AdminController::class, 'unsuspendUser']);

    Route::get('/programs', [AdminController::class, 'programs']);
    Route::post('/programs/{id}/approve', [AdminController::class, 'approveProgram']);
    Route::post('/programs/{id}/reject', [AdminController::class, 'rejectProgram']);

    Route::get('/admin/programs/{id}/detail', [AdminController::class, 'programDetail']);
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/home', [IndexController::class, 'index'])->name('home');

// TAMBAHKAN INI: Rute untuk halaman FAQ
Route::get('/faq', function () {
    return view('faq'); // Memanggil faq.blade.php
})->name('faq'); // Nama inilah yang dicari oleh {{ route('faq') }}

Route::get('/hubungi', fn () => view('hubungi'));