<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\VerificationController;

Route::prefix('admin')->group(function () {

    //testimonials
    Route::get('addtest',[TestimonialController::class,'create'])->name('addtest');
    Route::post('insert',[TestimonialController::class,'store'])->name('insert');
    Route::get('admintestimonials',[TestimonialController::class,'index'])->name('admintestimonials');
    Route::get('editTestimoninal/{id}',[TestimonialController::class,'edit'])->name('editTestimoninal');
    Route::put('updateTestimoninal/{id}',[TestimonialController::class,'update'])->name('updateTestimoninal');
    Route::get('deleteTestimoninal/{id}',[TestimonialController::class,'destroy']);
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //cars
    Route::get('addCar',[CarController::class,'create'])->name('addCar');
    Route::post('insertCar',[CarController::class,'store'])->name('insertCar');
    Route::get('cars',[CarController::class,'index'])->name('cars');
    Route::get('editCar/{id}',[CarController::class,'edit'])->name('editCar');
    Route::put('updateCar/{id}',[CarController::class,'update'])->name('updateCar');
    Route::get('deleteCar/{id}',[CarController::class,'destroy']);
    ////////////////////////////////////////////////////////////////////////////////////////
    //categories
    Route::get('addCategory',[CategoryController::class,'create'])->name('addCategory');
    Route::post('insertCat',[CategoryController::class,'store'])->name('insertCat');
    Route::get('categories',[CategoryController::class,'index'])->name('categories');
    Route::get('editCategory/{id}',[CategoryController::class,'edit'])->name('editCategory');
    Route::put('updateCategory/{id}',[CategoryController::class,'update'])->name('updateCategory');
    Route::get('deleteCategory/{id}',[CategoryController::class,'destroy']);
    ////////////////////////////////////////////////////////////////////////////////////////////
    //messages
    Route::get('contactUs',[MessageController::class,'create'])->name('contactUs');
    Route::post('insertmessage',[MessageController::class,'store'])->name('insertmessage');
    Route::get('messages',[MessageController::class,'index'])->name('messages');
    Route::get('showMessage/{id}',[MessageController::class,'show'])->name('showMessage');
    Route::get('deleteMessage/{id}',[MessageController::class,'destroy']);
    ////////////////////////////////////////////////////////////////////////////////////////////
    //users
    Route::get('addUser',[UserController::class,'create'])->name('addUser');
    Route::post('insertUser',[UserController::class,'store'])->name('insertUser');
    Route::get('users',[UserController::class,'index'])->name('users');
    Route::get('editUser/{id}',[UserController::class,'edit'])->name('editUser');
    Route::put('updateUser/{id}',[UserController::class,'update'])->name('updateUser');
    ////////////////////////////////////////////////////////////////////////////////////////////
    //registration
    
    Route::get('register', [RegisterController::class, 'showRegistrationForm']);
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::get('login', [LoginController::class, 'showLoginForm']);
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::get('verify', [VerificationController::class, 'verifyform']);
    Route::get('admin/email/verify/{verification_token}', [VerificationController::class, 'verify'])->name('verification.verify');


});
?>