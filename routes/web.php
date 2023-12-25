<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapController;
use Faker\Guesser\Name;

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

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'claculate');

    Route::prefix('/transcript')->group(function () {
        Route::get('/', 'transcriptData');
        Route::get('/edit/{id}','edit')->name('transcript.edit');
        Route::post('/update/{id}','update')->name('transcript.update');
        Route::get('/trashed/', 'trash')->name('transcript.trash');
        Route::get('/delete/', 'forceDelete')->name('transcript.forceDelete');
        Route::get('/trash/{id}', 'delete')->name('transcript.delete');
    });
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login',  'loginView')->name('login');
    Route::get('/logout',  'logout')->name('logout');
    Route::get('/register',  'registerView')->name('register');
    Route::post('/register',  'register')->name('admin.register');
    Route::post('/login',  'login')->name('admin.login');
});

// routes/web.php
Route::get('/map', [MapController::class,'showMap']);
