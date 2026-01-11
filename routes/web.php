<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserHistoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\OrganisasiDashboardController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CeritaController;
use App\Http\Controllers\EventProposalController;

// Route::middleware('auth')->get('/api/user/history', [UserHistoryController::class, 'index']);

// PUBLIC PAGES
Route::get('/', fn () => view('home'));
Route::get('/signup', fn () => view('signup'));
Route::get('/login', fn () => view('login'))->name('login');

Route::get('/programrelawan', [IndexController::class, 'programrelawan']);
Route::get('/programrelawan/{id}', [IndexController::class, 'programrelawandetail']);
Route::get('/organisasi/{id}', function ($id) {
    return view('organization_profile', compact('id'));
});

// web.php
// Route::get('/laporan/{file}', function ($file) {
//     $path = public_path("asset/pdf/$file");

//     if (!file_exists($path)) {
//         abort(404);
//     }

//     return response()->file($path);
// });

// Route::get('/programrelawan/{id}', [ProgramController::class, 'show']);
// Route::get('/programrelawan', function () {
//     return view('programrelawan');
// });

Route::middleware('auth')->post(
    '/relawan/daftar',
    [ProgramController::class, 'relawandaftar']
);


// Route::post('/relawan/daftar', [ProgramController::class, 'relawandaftar'])
//     ->middleware('auth');

Route::get('/relawan/cek-status/{programId}', 
    [ProgramController::class, 'cekStatusRelawan']
)->middleware('auth');

Route::get('/faq', fn () => view('faq'))->name('faq');
Route::get('/hubungi', fn () => view('hubungi'));


Route::get('/home', [IndexController::class, 'index'])->name('home');


// AUTH (SESSION BASED)
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::post('/signup', [AuthController::class, 'signup']);


// AUTH CHECK (UNTUK NAVBAR)
Route::middleware('auth')->get('/auth/user', function () {
    return response()->json(auth()->user());
});


// ADMIN PAGES (VIEW)
Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index']);
        Route::get('/programs', [AdminController::class, 'programs']);
        Route::get('/users', [AdminController::class, 'users']);
});

Route::middleware('auth')->get('/api/user/history', [UserHistoryController::class, 'index']);

Route::get('/auth/debug', function () {
    return [
        'auth_check' => auth()->check(),
        'user' => auth()->user(),
        'session_id' => session()->getId()
    ];
});

Route::middleware(['auth'])
    ->prefix('api/admin')
    ->group(function () {

        Route::get('/stats', [AdminController::class, 'stats']);

        Route::get('/programs', [AdminController::class, 'programs']);
        // Route::get('/programs/{id}', [AdminController::class, 'programDetail']);
        Route::get('/programs/{id}/detail', [AdminController::class, 'programDetail']);

        Route::post('/programs/{id}/approve', [AdminController::class, 'approveProgram']);
        Route::post('/programs/{id}/reject', [AdminController::class, 'rejectProgram']);

        Route::get('/users', [AdminController::class, 'users']);
        Route::post('/users/{id}/suspend', [AdminController::class, 'suspendUser']);
        Route::post('/users/{id}/unsuspend', [AdminController::class, 'unsuspendUser']);
    });

// ADMIN STATS
Route::middleware(['auth'])
    ->prefix('api/admin')
    ->group(function () {
        Route::get('/stats', [AdminController::class, 'stats']);
    });

Route::get('/donation', [DonationController::class, 'index']);
Route::get('/api/donation', [DonationController::class, 'apiIndex']);
Route::get('/donation/status', [DonationController::class, 'status']); // ⬅️ HARUS DI ATAS
Route::get('/donation/{donation}', [DonationController::class, 'show']);
Route::post('/donation/{id}/pay', [DonationController::class, 'pay']);

// ORGANISASI PAGE
// Route::middleware(['auth', 'role:organisasi'])->group(function () {
//     Route::get('/organisasiidx/dashboard', function () {
//         return view('index_org');
//     });
// });

Route::middleware(['auth', 'role:organisasi'])
    ->prefix('org')
    ->group(function () {
        Route::get('/dashboard', fn () => view('index_org'));
    });

Route::middleware(['auth', 'role:organisasi'])
    ->prefix('api/org')
    ->group(function () {

        Route::get('/dashboard', [OrganisasiDashboardController::class, 'index']);

        Route::get('/programs', [ProgramController::class, 'getProgramsByOrganisasi']);
        Route::get('/programs/all', [ProgramController::class, 'getAllProgramsByOrganisasi']);

        Route::get('/laporan', [OrganisasiDashboardController::class, 'laporan']);
        Route::get('/laporan/pending', [OrganisasiDashboardController::class, 'laporanPending']);
        Route::post('/laporan/upload/{program}', [OrganisasiDashboardController::class, 'uploadLaporan']);
        Route::get('/laporan/{program}', [OrganisasiDashboardController::class, 'downloadLaporan']);
    });

Route::middleware(['auth'])->group(function () {
    Route::post('/org/submit-donasi', [OrganisasiDashboardController::class, 'storeDonasi']);
    Route::post('/org/submit-volunteer', [OrganisasiDashboardController::class, 'storeVolunteer']);
});

// KOMUNITAS
Route::get('/community', [CommunityController::class, 'index'])->name('community.index');
Route::get('/community/{id}', [CommunityController::class, 'show'])->name('community.show');

// Forum routes
Route::get('/community/{komunitas_id}/forum', [ForumController::class, 'index'])->name('forum.index');
Route::post('/community/{komunitas_id}/forum', [ForumController::class, 'store'])->name('forum.store');
Route::post('/forum/{forum_id}/komentar', [ForumController::class, 'storeKomentar'])->name('forum.komentar');

// Cerita/Story routes
Route::get('/community/{komunitas_id}/cerita', [CeritaController::class, 'create'])->name('cerita.create');
Route::post('/community/{komunitas_id}/cerita', [CeritaController::class, 'store'])->name('cerita.store');

// Event Proposal routes
Route::get('/community/{komunitas_id}/event', [EventProposalController::class, 'create'])->name('event.create');
Route::post('/community/{komunitas_id}/event', [EventProposalController::class, 'store'])->name('event.store');