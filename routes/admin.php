<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return 'welcome';
    });



    Route::get('edit', function () {
        return view('admin.editTestimonial');
    });
});
?>