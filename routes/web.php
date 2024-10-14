<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\unitsController;
use App\Http\Controllers\leadsController;
use App\Http\Controllers\SelectController;
use Illuminate\Support\Facades\Auth;

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
  return view('auth.login');
});


Auth::routes();
Route::resource('index', 'AdminController')->middleware('auth');
Route::resource('users', 'usersController');
Route::resource('units', 'unitsController');
Route::resource('leads', 'leadsController');
Route::resource('select', 'SelectController');
