<?php

use App\Models\Advertisement;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SliderPictures;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KhcModelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\VeiwPostCountController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

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
Route::middleware('auth')->prefix('admin')->group(function(){

    //admin routes
    Route::middleware('admin')->group(function(){

        
        //Models Permissions Routes
        Route::post('/admin/user/type/{user}',[KhcModelController::class,'userLevelUpdate'])->name('userLevel');
        Route::post('/admin/user/permissions/{user}',[KhcModelController::class,'updateModelsPermission'])->name('updateModelsPermission');
        Route::post('admin/user/status/{user}',[KhcModelController::class,'userStatus'])->name('userStatus');

        //Models Access Routes
        Route::get('/admin/view/models/{user}',[KhcModelController::class,'index'])->name('permissions.index');
        Route::get('/admin/create/models/{user}',[KhcModelController::class,'createKhcModel'])->name('createKhcModel');
        Route::post('/admin/store/models/{user}',[KhcModelController::class,'storeKhcModel'])->name('storeKhcModel');
        Route::get('/admin/edit/models/{model}',[KhcModelController::class,'editKhcModel'])->name('editKhcModel');
        Route::post('/admin/update/models/{model}',[KhcModelController::class,'updateKhcModel'])->name('updateKhcModel');

        //Trashed posts routes
        Route::get('/posts/trashed',[PostController::class,'trashedPosts'])->name('posts.trashed');
        Route::get('/posts/restore/{post}',[PostController::class,'restorePost'])->name('posts.restore');
        Route::get('/posts/delete/{post}',[PostController::class,'deletePost'])->name('posts.delete');

        //categories routes
        Route::get('/categories',[CategoryController::class,'index'])->name('category.index');
        Route::post('/categories/store',[CategoryController::class,'store'])->name('category.store');
        Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('categories/update/{category}',[CategoryController::class,'update'])->name('category.update');
        Route::delete('/categoryies/{category}',[CategoryController::class,'destroy'])->name('category.destroy');
    });

    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    Route::resources([
        'users' => UserController::class,
        'posts' => POstController::class,
        'tags'   => TagController::class,
        'ads'   => AdvertisementController::class,
        'slider'=> SliderController::class,
    ]);
    
});

Route::get('/', [HomeController::class,'index'])->name('index');
Route::get('/post/{post}/details',[HomeController::class,'viewPostDetails'])->name('viewPostDetails');
Route::get('/services/{category}',[HomeController::class,'viewPostsByCategory'])->name('viewPostsByCategory');
Route::get('/about/khc/',[HomeController::class,'about'])->name('about');


//Authentication routes
Route::get('/login', [LoginController::class,'loginPage'])->name('login')->middleware('throttle:login');
Route::post('/login', [LoginController::class,'authenticate'])->name('authenticate');

//search content routes
// Route::get('/search',[HOmeController::class,'search'])->name('search');

//fall back route
Route::fallback(function(){
    return redirect()->back()->with('warning','Unknown Data');
});
