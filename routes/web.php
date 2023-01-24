<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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


Route::get('/', [UserController::class, 'index'])->name('index');


Route::post('/user/{user}/role/attach', [UserController::class, 'addRole'])->name('user.add.role');
Route::post('authenticate', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/login', function (){
    return view('login');
})->name('login');

Route::get('admin', function (){
    return 'admin panel';
})->name('admin')->middleware('auth');

Route::resource('user', UserController::class);

