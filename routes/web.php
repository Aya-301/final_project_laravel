<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('verified');

Route::get('home', [RentalController::class, 'home'])->name('index');
Route::get('list', [RentalController::class, 'list'])->name('carList');
Route::get('testimonials', [RentalController::class, 'testimonials'])->name('testimonials');
Route::get('blog', [RentalController::class, 'blog'])->name('blog');
Route::get('about', [RentalController::class, 'about'])->name('about');
Route::get('contact', [RentalController::class, 'contact'])->name('contactUs');
Route::get('single/{id}', [RentalController::class, 'single'])->name('single');

Auth::routes(['verify'=>true]);
    Route::get('register', [RegisterController::class, 'showRegistrationForm']);
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::get('login', [LoginController::class, 'showLoginForm']);
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::get('verify', [VerificationController::class, 'verifyform']);
    Route::get('admin/email/verify/{verification_token}', [VerificationController::class, 'verify'])->name('verification.verify');
//Auth::routes();
//Route::get('/home1', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
