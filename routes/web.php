<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\ProfileController as ControllersProfileController;
use App\Models\blog;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
    $blog = blog::all();
    return view('welcome',compact('blog'));
});

Auth::routes();


//User side

Route::get('/blog',[FrontendController::class,'index'])->name('user.index');
Route::get('/get-blog/{id}',[FrontendController::class,'blogDesp'])->name('user.blogDescription');
//Blog


Route::middleware(['auth'])->group(function(){
Route::post('/blog-store',[BlogController::class,'store'])->name('blog.store');
Route::get('/add-blog',[FrontendController::class,'addBlog'])->name('user.addBlog');
Route::get('/edit-blog/{id}',[BlogController::class,'edit'])->name('blog.edit');
Route::post('/update-blog/{id}',[BlogController::class,'update'])->name('blog.update');
Route::delete('/delete/{id}',[BlogController::class,'destroy'])->name('blog.destroy');

//comment
Route::post('/add-comment',[CommentController::class,'store'])->name('comment.store');
Route::get('/get-comment/{id}',[CommentController::class,'edit'])->name('comment.edit');
Route::post('/update-comment/{id}',[CommentController::class,'update'])->name('comment.update');
Route::delete('/delete-comment/{id}',[CommentController::class,'destroy'])->name('comment.destroy');

//profile
Route::get('/get-profile',[ProfileController::class,'index'])->name('profile.index');
Route::get('/edit-profile/{id}',[ProfileController::class,'edit'])->name('profile.edit');
Route::post('/update-profile/{id}',[ProfileController::class,'update'])->name('profile.update');
Route::post('/change-password',[ProfileController::class,'changePassword'])->name('profile.changePassword');
Route::delete('/delete-profile/{id}',[ProfileController::class,'destroy'])->name('profile.destroy');

//upvote downvote blog

Route::post('/blog-upvote/{id}',[BlogController::class,'upvote'])->name('blog.upvote');
Route::post('/blog-downvote/{id}',[BlogController::class,'downvote'])->name('blog.downvote');


//upvote downvote comment

Route::post('/comment-upvote/{id}',[CommentController::class,'upvote'])->name('comment.upvote');
Route::post('/comment-downvote/{id}',[CommentController::class,'downvote'])->name('comment.downvote');








});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['admin'])->group(function(){

//admin side
Route::get('/dashboard',[dashboardController::class,'index'])->name('admin.dashboard');
Route::get('/blog',[AdminController::class,'blog'])->name('admin.blog');
Route::get('/user',[AdminController::class,'user'])->name('admin.user');


});


