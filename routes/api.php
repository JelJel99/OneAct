<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProgramController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/home/programs', [ProgramController::class, 'index']);
// Route::get('/programs', [ProgramController::class, 'index']);

/*
|--------------------------------------------------------------------------
| SUPPORT
|--------------------------------------------------------------------------
*/
Route::get('/faq', [SupportController::class, 'getFaqs']);
Route::post('/contact', [SupportController::class, 'submitContact']);

/*
|--------------------------------------------------------------------------
| ADMIN API
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    // PROGRAMS (ajuan organisasi)
    Route::get('/programs', [AdminController::class, 'programs']);          // list
    Route::get('/programs/{id}', [AdminController::class, 'programDetail']); // detail
    Route::post('/programs/{id}/approve', [AdminController::class, 'approveProgram']);
    Route::post('/programs/{id}/reject', [AdminController::class, 'rejectProgram']);

    // USERS (optional, kalau dipakai)
    Route::get('/users', [AdminController::class, 'users']);
    Route::post('/users/{id}/suspend', [AdminController::class, 'suspendUser']);
    Route::post('/users/{id}/unsuspend', [AdminController::class, 'unsuspendUser']);
});
