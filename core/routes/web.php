<?php

use Illuminate\Support\Facades\Route;

Route::controller('SiteController')->group(function () {  
    Route::get('/', 'index')->name('home');
    Route::get('category/{slug}', 'category_details')->name('category.details');
    Route::get('post/{slug}', 'post_details')->name('post.details');
    Route::get('search', 'search')->name('search');
    Route::get('placeholder-image/{size}', 'placeholder_image')->name('placeholder.image');
    Route::get('/{slug}', 'pages')->name('pages');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contactSubmit');
});
