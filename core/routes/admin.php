<?php

use Illuminate\Support\Facades\Route;


Route::namespace('Auth')->group(function () {
    Route::middleware('admin.guest')->group(function(){
        Route::controller('LoginController')->group(function () {
            Route::get('/', 'loginform')->name('login');
            Route::post('/', 'login')->name('login');
            Route::get('logout', 'logout')->middleware('admin')->withoutMiddleware('admin.guest')->name('logout');
        });

        // Admin Password Reset
        Route::controller('ForgotPasswordController')->prefix('password')->name('password.')->group(function(){
            Route::get('reset', 'showLinkRequestForm')->name('reset');
            Route::post('reset', 'sendResetCodeEmail');
            Route::get('code-verify', 'codeVerify')->name('code.verify');
            Route::post('verify-code', 'verifyCode')->name('verify.code');
        });

        Route::controller('ResetPasswordController')->group(function(){
            Route::get('password/reset/{token}', 'showResetForm')->name('password.reset.form');
            Route::post('password/reset/change', 'reset')->name('password.change');
        });
    });
});


Route::middleware(['admin'])->group(function () {
    Route::controller('AdminController')->group(function(){
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('profile', 'profile')->name('profile');
        Route::post('profile', 'profileUpdate')->name('profile.update');
        Route::get('password', 'password')->name('password');
        Route::post('password', 'passwordUpdate')->name('password.update');

        //Notification
        Route::get('notifications','notifications')->name('notifications');
        Route::get('notification/read/{id}','notificationRead')->name('notification.read');
        Route::get('notifications/read-all','readAllNotification')->name('notifications.read.all');
        Route::post('notifications/delete-all','deleteAllNotification')->name('notifications.delete.all');
        Route::post('notifications/delete-single/{id}','deleteSingleNotification')->name('notifications.delete.single');

       
        //Check Slug
        Route::post('check/slug','checkSlug')->name('check.slug');

    });

    // Category
    Route::controller('CategoryController')->name('category.')->prefix('categories')->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('store/{id?}', 'store')->name('store');
        Route::post('status/{id}', 'status')->name('status');
        Route::get('seo/{id}', 'seoSetting')->name('seo');
        Route::post('seo-store/{id}', 'seoStore')->name('seo.submit');
    });

    //Posts
    Route::controller('PostController')->name('post.')->prefix('post')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('pending', 'pending')->name('pending');
        Route::get('approved', 'approved')->name('approved');
        Route::get('rejected', 'rejected')->name('rejected');

        // create post
        Route::get('create', 'create')->name('create');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::get('slug-check', 'slugCheck')->name('slug.check');
        Route::post('store/{id?}', 'store')->name('store');

        // status
        Route::post('status/{post}', 'status')->name('status');
        Route::post('admin-check/{id}', 'approveOrReject')->name('admin.check');

    });

    // Subscriber
    Route::controller('SubscriberController')->prefix('subscriber')->name('subscriber.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('send-email', 'sendEmailForm')->name('send.email');
        Route::post('remove/{id}', 'remove')->name('remove');
        Route::post('send-email', 'sendEmail')->name('send.email');
    });


});