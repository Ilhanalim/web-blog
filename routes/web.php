<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;

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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'show')->name('home');
    Route::get('/about', 'about')->name('home.about');
    
    Route::get('/blog/{id}', 'showById')->name('home.id');
    Route::post('/blog/{id}', 'addComment')->name('home.id.comment');
    // Route::delete('/blog/{id}/{commentId}', 'deleteComment')->name('home.id.delete');
    Route::delete('/comments/{commentId}', [HomeController::class, 'deleteComment'])->name('comments.delete');

    Route::get('/author/{name}', 'showByUser')->name('home.user');
});


Route::controller(AuthController::class)->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/login', 'showLogin')->name('login.show');
        Route::post('/login', 'login')->name('login');

        Route::get('/register', 'showRegister')->name('register.show');
        Route::post('/register', 'accountRegister')->name('register.add');
    });


    Route::post('/logout', 'logout')->name('logout');
});

Route::resource('/profile', ProfileController::class)->name('index', 'profile')->middleware('auth');

// Route::controller(ProfileController::class)->group(function () {
//     Route::middleware('auth')->group(function () {
//         Route::get('/profile/{id}', 'index')->name('profile');
//     });
// });


Route::get('/upload', [UploadController::class, 'show']);
Route::post('/upload', [UploadController::class, 'addBlog']);

// Route::get('/about', [About::class]);