<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\FrontendController;
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
    return view('welcome');
});

Auth::routes();


//User side

Route::get('/blog',[FrontendController::class,'index'])->name('user.index');
Route::get('/get-blog',[FrontendController::class,'blogDesp'])->name('user.blogDescription');
Route::get('/add-blog',[FrontendController::class,'addBlog'])->name('user.addBlog');
//Blog

Route::post('/blog-store',[BlogController::class,'store'])->name('blog.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['admin'])->group(function(){

//admin side
Route::get('/dashboard',[dashboardController::class,'index'])->name('admin.dashboard');
Route::get('/blog',[AdminController::class,'blog'])->name('admin.blog');
Route::get('/user',[AdminController::class,'user'])->name('admin.user');


});


