<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestimonialController;

Route::prefix('admin')->group(function () {

    // Route::get('addtest',[TestimonialController::class,'create'])->name('addtest');
    // Route::post('insert',[TestimonialController::class,'store'])->name('insert');
    Route::get('testimonials',[TestimonialController::class,'index'])->name('testimonials');
    // Route::get('showTestimoninals/{id}',[TestimonialController::class,'show'])->name('showTestimoninals');
    // Route::get('editTestimoninals/{id}',[TestimonialController::class,'edit'])->name('editTestimoninals');
    // Route::put('updateTestimoninals/{id}',[TestimonialController::class,'update'])->name('updateTestimoninals');
    // Route::get('deleteTestimoninals/{id}',[TestimonialController::class,'destroy']);


});
?>