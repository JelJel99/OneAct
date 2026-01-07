<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RelawanController;
use App\Http\Controllers\UserHistoryController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Route::get('/user', function (Request $request) {
//     return Auth::check()
//         ? response()->json(Auth::user())
//         : response()->json(null, 401);
// });

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/user/history', [UserHistoryController::class, 'index']);
//     // Tambah route API user yang butuh autentikasi di sini
// });

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/signup', [AuthController::class, 'signup']);
// Route::post('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| HOME (PUBLIC API)
|--------------------------------------------------------------------------
*/
Route::get('/home/programs', [ProgramController::class, 'apiHomePrograms']);
Route::get('/relawan/{id}', [RelawanController::class, 'show']);

// Relawan Programs
Route::get('/programrelawan', [ProgramController::class, 'programRelawanApproved']);
// Route::get('/relawan/{id}', [ProgramController::class, 'showRelawan']);
Route::get('/detail-relawan/{id}', [RelawanController::class, 'show']);
Route::get('/api/relawan', [RelawanController::class, 'index']);

// Route::middleware('auth:api')->post('/relawan/daftar', [ProgramController::class, 'relawandaftar']);
// Route::middleware('auth')->post(
//     '/relawan/daftar',
//     [ProgramController::class, 'relawandaftar']
// );

// Support routes
Route::get('/faq', [SupportController::class, 'getFaqs']);
Route::post('/contact', [SupportController::class, 'submitContact']);

/*
|--------------------------------------------------------------------------
| USER (LOGIN REQUIRED)
|--------------------------------------------------------------------------
*/
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:sanctum')->get('/user/history', [HistoryController::class, 'index']);

// Route::get('/user/history', [UserHistoryController::class, 'index']);

/*
|--------------------------------------------------------------------------
| ADMIN API (PROTECTED)
|--------------------------------------------------------------------------
*/
// Route::middleware('auth:sanctum')
//     ->prefix('admin')
//     ->group(function () {

//         Route::get('/programs', [AdminController::class, 'programs']);
//         Route::get('/programs/{id}', [AdminController::class, 'programDetail']);

//         Route::post('/programs/{id}/approve', [AdminController::class, 'approveProgram']);
//         Route::post('/programs/{id}/reject', [AdminController::class, 'rejectProgram']);

//         Route::get('/users', [AdminController::class, 'users']);
//         Route::post('/users/{id}/suspend', [AdminController::class, 'suspendUser']);
//         Route::post('/users/{id}/unsuspend', [AdminController::class, 'unsuspendUser']);
//     });