<?php

use App\Http\Controllers\CariController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [CariController::class, 'home'])->name('home');
Route::get('/carikata', [CariController::class, 'cariKata'])->name('carikata');
Route::get('/cariperibahasa', [CariController::class, 'cariPeribahasa'])->name('cariperibahasa');

Auth::routes(['register' => false]);

Route::resource('/admin', DashboardController::class);
Route::resource('admin/data/user', UserController::class);
