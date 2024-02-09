<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserRoleController;
use App\Http\Middleware\IsAuthenticated;
use App\Http\Middleware\IsBibliothecaire;
use Illuminate\Support\Facades\Auth;

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

// Route::middleware([IsAuthenticated::class])->group(function () {
    Route::get('/client/books', [BookController::class, 'index'])->name('books.index');
// });

// Route::middleware([IsBibliothecaire::class])->group(function () {
    Route::resource('books', BookController::class);
// });
//

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/reservation/notifications', [ReservationController::class, 'notifications'])->name('notifications');
Route::resource('roles', RoleController::class);
Route::resource('user_roles', UserRoleController::class);
Route::resource('book_reservations', BookReservationController::class);
Route::resource('reservation', ReservationController::class);
