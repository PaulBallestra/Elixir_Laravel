<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

//HOME
Route::get('/', [App\Http\Controllers\Controller::class, 'accueil'])->name('accueil');

//ACTUALITES
Route::get('/actualites', [App\Http\Controllers\Controller::class, 'actualites'])->name('actualites');

//CURRENT ACTUALITE
Route::get('/actualites/1', [App\Http\Controllers\Controller::class, 'actualite']);

//SERVICES
Route::get('/service', [App\Http\Controllers\Controller::class, 'service'])->name('service');

//CONTACT
Route::get('/contact', [App\Http\Controllers\Controller::class, 'contact'])->name('contact');

//ABONNEMENT
Route::get('/abonnement', [AuthenticatedSessionController::class, 'abonnement'])
    ->middleware('auth')
    ->name('abonnement');

//PAIEMENT MONTHLY ABONNEMENT
Route::get('/abonnement/monthly', [AuthenticatedSessionController::class, 'monthlyAbonnement'])
    ->middleware('auth')
    ->name('monthlyAbonnement');

//PAIEMENT YEARLY ABONNEMENT
Route::get('/abonnement/yearly', [AuthenticatedSessionController::class, 'yearlyAbonnement'])
    ->middleware('auth')
    ->name('yearlyAbonnement');

//PROFILE
Route::get('/profile', [AuthenticatedSessionController::class, 'profile'])
    ->middleware('auth')
    ->name('profile');

Route::post('/profile', [AuthenticatedSessionController::class, 'saveProfile'])
    ->middleware('auth')
    ->name('profile.save');

//ADMIN
Route::get('/admin', [AuthenticatedSessionController::class, 'admin'])
    ->middleware('auth')
    ->name('admin');

//LOGIN
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

//REGISTER
Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

//TOUT LE BORDEL DE BREEZE
//FORGOT PASSWORD
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
                ->middleware('auth')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

//LOGOUT
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
