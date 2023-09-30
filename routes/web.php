<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Laravel\Ui\Presets\React;

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
Route::match(['get', 'post'],'/usedemo',function(Request $request){
    $request->validate([
        'email'=>'unique:users',
    ]);
    User::create([
        'name'=>'abderahman',
        'email'=>'demo@gmail.com',
        'role'=>'Manager',
        'password'=>Hash::make('12345678'),
    ]);
    return '<h1>thank you for your register.</h1><script>setTimeout(()=>location.href = "/login",2000)</script>';
});
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
