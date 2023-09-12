<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MasterKendaraanController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

Auth::routes(['verify' => true]);

Route::get('/', [HomepageController::class, 'showHomepage'])->name('homepage');
Route::get('/about', [HomepageController::class, 'showAboutus'])->name('aboutus');
// Route::get('/transport', [HomepageController::class, 'showTransport'])->name('transport');
Route::get('/contact', [HomepageController::class, 'showContact'])->name('contact');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/verification', [VerificationController::class, 'showVerificationForm'])->name('verification');
Route::post('/verification', [VerificationController::class, 'sendVerification']);
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/send-email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('users/list', [UsersController::class, 'list'])->name('users.list');
Route::resource('users', UsersController::class);

Route::get('masterkendaraan/list', [MasterKendaraanController::class, 'list'])->name('masterkendaraan.list');
Route::resource('masterkendaraan', MasterKendaraanController::class);

Route::get('kendaraan/list', [KendaraanController::class, 'list'])->name('kendaraan.list');
Route::resource('kendaraan', KendaraanController::class);

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});

// Route::middleware([
  //     'auth',
  // ])->group(function () {
    //     Route::get('/dashboard', function() {
      //         return redirect()->route('dashboard.index');
      //     });
      // });
