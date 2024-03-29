<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DashboardController;

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

Route::get('/',[PagesController::class,'index']);
Route::get('/services',[PagesController::class,'services']);
Route::get('/about',[PagesController::class,'about']);

Route::resource('posts',PostsController::class);

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

require __DIR__.'/auth.php';
