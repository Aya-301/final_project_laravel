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
});

Route::get('home', [RentalController::class, 'home'])->name('index');
Route::get('list', [RentalController::class, 'list'])->name('carList');
Route::get('testimonials', [RentalController::class, 'testimonials'])->name('testimonials');
Route::get('blog', [RentalController::class, 'blog'])->name('blog');
Route::get('about', [RentalController::class, 'about'])->name('about');
Route::get('contact', [RentalController::class, 'contact'])->name('contactUs');


