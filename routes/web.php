<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Login\LoginController;
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
// Login admin
Route::controller(LoginController::class)->group(function () {
    Route::get('/admin', 'getLogin')->name('getLogin');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/post_login', 'postLogin')->name('postLogin');
});

Route::get('/', function () {
    return view('welcome');
});
