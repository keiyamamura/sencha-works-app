<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\User\InfoController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');


// Route::get('/dashboard', function () {
//     return view('user.dashboard');
// })->middleware(['auth:users'])->name('dashboard');

Route::middleware(['auth:users'])->group(function () {
    Route::get('/dashboard', [JobController::class, 'list'])
        ->name('dashboard');

    Route::prefix('applicant')->name('applicant.')->group(function () {
        Route::get('create/{job}', [ApplicantController::class, 'create'])
            ->name('create');
        Route::post('store/{job}', [ApplicantController::class, 'store'])
            ->name('store');
    });

    Route::prefix('job')->name('job.')->group(function () {
        Route::get('show/{id}', [JobController::class, 'show'])
            ->name('show');
    });

    Route::prefix('favorite')->name('favorite.')->group(function () {
        Route::get('list', [favoriteController::class, 'list'])
            ->name('list');
        Route::post('store/{user}/{job}', [favoriteController::class, 'store'])
            ->name('store');
        Route::post('destroy/{user}/{job}', [favoriteController::class, 'destroy'])
            ->name('destroy');
    });

    Route::prefix('info')->name('info.')->group(function () {
        Route::get('show/{id}', [InfoController::class, 'show'])
            ->name('show');
        Route::get('edit/{id}', [InfoController::class, 'edit'])
            ->name('edit');
        Route::post('update/{id}', [InfoController::class, 'update'])
            ->name('update');
    });
});

require __DIR__.'/auth.php';
