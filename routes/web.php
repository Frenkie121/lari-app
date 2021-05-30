<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AccessController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home');

Route::middleware(['can:Manage event', 'auth'])->group(function(){
    Route::resource('event', EventController::class);
});

Route::post('access', [AccessController::class, 'access'])->middleware(['auth'])->name('course.access');

Route::get('cours/{link}', [AccessController::class, 'classroom'])->middleware(['auth'])->name('course.classroom');
