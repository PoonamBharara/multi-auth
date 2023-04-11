<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RedirectController;
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
// Route::get('/', [HomeController::class, 'homeLike']);
Route::get('/', function(){
    
});
Route::get('/register', [HomeController::class, 'index'])->name('register');
Route::post('/register', [HomeController::class, 'store'])->name('register-post');

Route::get('/login', [HomeController::class, 'login'] )->name('login');


Route::post('/loginPost', [HomeController::class, 'login'] )->name('login-post'); 
Route::middleware(['auth', 'userAccess'])->group(function () {
   
    Route::get('/home', [RedirectController::class, 'index'])->name('home');
});
  

Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [RedirectController::class, 'adminHome'])->name('admin.home');
});
  

Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [RedirectController::class, 'managerHome'])->name('manager.home');
});





