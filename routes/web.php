<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkShortenerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth:web')->group(function(){
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('/dashboard',[DashboardController::class, 'index'])->name('dashboard.post');
    Route::get('/dashboard/logout', [DashboardController::class, 'logout'])->name('dashboard.logout');
    Route::get('/dashboard/links/delete/{id}',[DashboardController::class, 'delete'])->name('link.delete');
});

Route::get('/', [HomeController::class, 'index'] )->name('homepage');
Route::post('/', [LinkShortenerController::class, 'store'] )->name('linkshort');
Route::get('/signup', [UserController::class, 'index'])->name('signupget');
Route::post('/signup', [UserController::class, 'store'])->name('signuppost');

Route::get('/login', [UserController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('{code}', [LinkShortenerController::class, 'shortenLink'])->name('shorten.link');


