<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KhcModelController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermissionController;

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

// protected routes
Route::middleware('auth')->group(function(){

    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class);
    Route::resource('tags',TagController::class);

    //admin routes
    Route::get('/admin/view/models/{user}',[KhcModelController::class,'index'])->name('permissions.index')->middleware('admin');
    Route::get('/admin/create/models/{user}',[KhcModelController::class,'createKhcModel'])->name('createKhcModel');
    Route::post('/admin/store/models/{user}',[KhcModelController::class,'storeKhcModel'])->name('storeKhcModel');
    Route::get('/admin/edit/models/{model}',[KhcModelController::class,'editKhcModel'])->name('editKhcModel');
    Route::post('/admin/update/model/{model}',[KhcModelController::class,'updateKhcModel'])->name('updateKhcModel');
   

    
});

Route::get('/', [HomeController::class,'index'])->name('index');
Route::get('/login', [LoginController::class,'loginPage'])->name('login');
Route::post('/login', [LoginController::class,'authenticate'])->name('authenticate');

