<?php

use Illuminate\Support\Facades\Route;

Route::controller('SiteController')->group(function () {  
    Route::get('/', 'index')->name('home');
    Route::get('category/{id}', 'category_details')->name('category.details');
    Route::get('post/{slug}', 'post_details')->name('post.details');
    Route::get('placeholder-image/{size}', 'placeholder_image')->name('placeholder.image');
    
});
