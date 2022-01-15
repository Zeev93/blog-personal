<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostCommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/search/{tag}/tag', [SearchController::class, 'searchByTag'])->name('search.tag');
Route::get('search/{category}/category', [SearchController::class, 'searchByCategory'])->name('search.category');
Route::get('visit/{post}', [HomeController::class, 'visitPost'])->name('visit.post');


Route::group(['middleware' => ['auth']], function(){

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['role:Admin|Blogger'])->name('dashboard');

    Route::resource('posts', PostController::class)->middleware('role:Admin|Blogger');
    Route::resource('tags', TagController::class)->middleware('role:Admin|Blogger');
    Route::resource('categories', CategoryController::class)->middleware('role:Admin|Blogger');

    Route::resource('roles', RoleController::class)->middleware('role:Admin');
    Route::resource('users', UserController::class)->middleware('role:Admin');

    Route::post('comment', [PostCommentController::class, 'store'])->name('comment.store');
    Route::delete('comment', [PostCommentController::class, 'destroy'])->name('comment.destroy');
});





require __DIR__.'/auth.php';
