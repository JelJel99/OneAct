<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RelawanController;
use App\Http\Controllers\UserHistoryController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\OrganisasiDashboardController;

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
Route::get('/organisasi/{id}', [OrganisasiController::class, 'showOrg']);
Route::get('/programs', [ProgramController::class, 'getProgramsByOrganisasi']);
Route::get('/laporan', [OrganisasiDashboardController::class, 'laporan']);
// Route::get('/laporan', [LaporanController::class, 'byOrganisasi']);


// Relawan Programs
Route::get('/programrelawan', [ProgramController::class, 'programRelawanApproved']);
Route::get('/detail-relawan/{id}', [RelawanController::class, 'show']);
Route::get('/api/relawan', [RelawanController::class, 'index']);

// Support routes
Route::get('/faq', [SupportController::class, 'getFaqs']);
Route::post('/contact', [SupportController::class, 'submitContact']);
