<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::resource('/room',RoomController::class);
    Route::resource('/client',ClientController::class);
    Route::resource('/employee',EmployeeController::class);
    Route::resource('/user',UserController::class);
    Route::get('/about', function () {
        return view('admin.about');
    })->name('admin.about');
});
Route::resource('admin',AdminController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
