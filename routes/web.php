<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\User\PostController;
use App\Http\Middleware\actionMailMiddleware;
use App\Http\Middleware\roleMiddleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.home.home');
// });

//================== Merchant Dashboard Start ================
    Route::get('/merchant/dashboard',[PostController::class, 'merchantHome'])->name('merchant.dashboard')->middleware(roleMiddleware::class,'auth');
//================== Merchant Dashboard End ================


//================== User Dashboard Start ================
Route::prefix('user/dashboard')->middleware('auth')->group(function () {
    Route::get('/',function(){
     return view('dashboard.home.home');
    });

    Route::resource('/post',PostController::class,['as' => 'user'])->middleware(actionMailMiddleware::class);
});
//================== User Dashboard End ================


//================== Public Routes Start ================
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/blog',[HomeController::class,'blog'])->name('blog');
Route::get('/blog-details/{id}',[HomeController::class,'blog_details'])->name('blog_details');

Route::post('blog/comment',[HomeController::class, 'postComment'])->name('comment.post');
//================== Public Routes End ================




//================== User Authentication Start ================
Route::get('login',[AuthenticationController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('login',[AuthenticationController::class, 'login'])->middleware('guest')->name('login');

Route::get('register',[AuthenticationController::class, 'showRegisterForm'])->name('register');
Route::post('register',[AuthenticationController::class, 'register'])->name('register')->middleware(actionMailMiddleware::class);

Route::post('logout',[AuthenticationController::class, 'logout'])->middleware('auth')->name('logout');