<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EducationController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

//Route::get('/dashboard', function () {
//  return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'admin'])->get('/test-admin', function () {
    return 'ADMIN OK';
});



/*
|--------------------------------------------------------------------------
| REPORT (LAPORAN HEWAN)
|--------------------------------------------------------------------------
*/

// FORM PELAPORAN (harus login)
Route::middleware('auth')->group(function () {

    // tampilkan form
    Route::get('/form', [ReportController::class, 'create'])
        ->name('reports.create');

    // simpan laporan
    Route::post('/form', [ReportController::class, 'store'])
        ->name('reports.store');

    Route::get('/daftar-hewan/{report}/edit', [ReportController::class, 'edit'])
        ->name('reports.edit');

    Route::put('/daftar-hewan/{report}', [ReportController::class, 'update'])
        ->name('reports.update');

    Route::delete('/daftar-hewan/{report}', [ReportController::class, 'destroy'])
        ->name('reports.destroy');
});

// DAFTAR HEWAN (publik)
Route::get('/daftar-hewan', [ReportController::class, 'index'])
    ->name('reports.index');

// DETAIL HEWAN
Route::get('/daftar-hewan/{report}', [ReportController::class, 'show'])
    ->name('reports.show');

//Komentar
Route::post(
    '/daftar-hewan/{report}/comment',
    [CommentController::class, 'store']
)->middleware('auth')->name('comments.store');


Route::get('/maps', function () {
    return view('pages.maps');
})->name('maps');



//EDUKASI USER DAN ATMIN

/* USER */

Route::get('/edukasi', [EducationController::class, 'publicIndex'])->name('edukasi.index');
Route::get('/edukasi/{education:slug}', [EducationController::class, 'show'])->name('edukasi.detail');

/* ADMIN */
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/edukasi', [EducationController::class, 'index'])->name('admin.edukasi.index');
    Route::get('/edukasi/create', [EducationController::class, 'create'])->name('admin.edukasi.create');
    Route::post('/edukasi', [EducationController::class, 'store'])->name('admin.edukasi.store');
    Route::get('/edukasi/{education}/edit', [EducationController::class, 'edit'])->name('admin.edukasi.edit');
    Route::put('/edukasi/{education}', [EducationController::class, 'update'])->name('admin.edukasi.update');
    Route::delete('/edukasi/{education}', [EducationController::class, 'destroy'])->name('admin.edukasi.destroy');
});



Route::get('/create-admin', function () {
    User::create([
        'name' => 'Admin',
        'email' => 'admin@petresq.com',
        'role' => 'admin',
        'password' => Hash::make('admin123'),
        'email_verified_at' => now(),
    ]);

    return 'Admin Created';
});
