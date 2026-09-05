<?php

use App\Http\Controllers\Owner\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Owner\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Owner\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Owner\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Owner\Auth\NewPasswordController;
use App\Http\Controllers\Owner\Auth\PasswordResetLinkController;
use App\Http\Controllers\Owner\Auth\RegisteredUserController;
use App\Http\Controllers\Owner\Auth\VerifyEmailController;
use App\Http\Controllers\Owner\InfoController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicantController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:owners'])->group(function () {
    Route::get('/dashboard', [JobController::class, 'index'])
        ->name('dashboard');
    Route::get('/show/{id}', [InfoController::class, 'show'])
        ->name('info.show');
    Route::get('/edit/{id}', [InfoController::class, 'edit'])
        ->name('info.edit');
    Route::post('/update/{id}', [InfoController::class, 'update'])
        ->name('info.update');
    Route::get('/job/create', [JobController::class, 'create'])
        ->name('job.create');
    Route::post('/job/confirm', [JobController::class, 'confirm'])
        ->name('job.confirm');
    Route::post('/job/store', [JobController::class, 'store'])
        ->name('job.store');
    Route::get('/job/edit/{id}', [JobController::class, 'edit'])
        ->name('job.edit');
    Route::post('/job/update/{id}', [JobController::class, 'update'])
        ->name('job.update');
    Route::post('/job/destroy/{id}', [JobController::class, 'destroy'])
        ->name('job.destroy');

    Route::prefix('applicant')->name('applicant.')->group(function () {
        Route::get('index', [ApplicantController::class, 'index'])
            ->name('index');
        Route::get('show/{user}/{job}', [ApplicantController::class, 'show'])
            ->name('show');
        Route::post('consent/{user}/{job}', [ApplicantController::class, 'consent'])
            ->name('consent');
        Route::post('destroy/{user}/{job}', [ApplicantController::class, 'destroy'])
            ->name('destroy');
    });
});


Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('auth:owners')
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth:owners', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth:owners', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware('auth:owners')
    ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware('auth:owners');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:owners')
    ->name('logout');
