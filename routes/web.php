<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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

Route::get('home', [CarController::class, 'home'])->name('index');
Route::get('list', [CarController::class, 'list'])->name('carList');
Route::get('testimonials', [CarController::class, 'testimonials'])->name('testimonials');
Route::get('blog', [CarController::class, 'blog'])->name('blog');
Route::get('about', [CarController::class, 'about'])->name('about');
Route::get('contact', [CarController::class, 'contact'])->name('contactUs');


