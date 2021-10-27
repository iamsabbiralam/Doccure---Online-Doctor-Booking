<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AppointmentController;
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

Route::get('/', [FrontController::class, 'welcomePage'])->name('welcome');
Route::get('/doctor', [FrontController::class, 'doctors'])->name('doctors');
Route::post('/search', [FrontController::class, 'search'])->name('search');
// Route::get('/category', [FrontController::class, 'category'])->name('category');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('banners', BannerController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('categories', CategoryController::class);
Route::get('appointment/create/{id}', [AppointmentController::class, 'create'])->name('appointment.create')->middleware('auth');
Route::post('appointment/create', [AppointmentController::class, 'store'])->name('appointment.store')->middleware('auth');
Route::get('appointment/index', [AppointmentController::class, 'index'])->name('appointment.index')->middleware('is_admin');
