<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(AdminController::class)->group(function (){
    Route::get('admin/logout', 'destroy')->name('admin.logout');
    Route::get('admin/profile', 'admin_profile')->name('admin.profile');
    Route::get('edit/profile', 'edit_profile')->name('edit.profile');
    Route::post('update/profile', 'update_profile')->name('update.profile');
    Route::get('change/password', 'change_password')->name('change.password');
    Route::post('update/password', 'update_password')->name('update.password');
});

Route::controller(CategoryController::class)->group(function (){
    Route::get('categories/index', 'index')->name('categories.index');
    Route::get('categories/create', 'create')->name('categories.create');
    Route::post('categories/store', 'store')->name('categories.store');
    Route::get('categories/edit/{category}', 'edit')->name('categories.edit');
    Route::post('categories/update', 'update')->name('categories.update');
    Route::get('categories/delete/{category}', 'destroy')->name('categories.delete');
});

Route::controller(PostController::class)->group(function (){
    Route::get('posts/index', 'index')->name('posts.index');
    Route::get('posts/create', 'create')->name('posts.create');
    Route::post('posts/store', 'store')->name('posts.store');
    Route::get('posts/delete/{post}', 'destroy')->name('posts.delete');
    Route::get('trashed-posts/index', 'trashPosts')->name('trashed.posts');
    Route::get('trashed-posts/delete/{id}', 'deleteTrashed')->name('trashed.delete');
    Route::get('posts/edit/{post}', 'edit')->name('posts.edit');
    Route::post('posts/update', 'update')->name('posts.update');
    Route::post('posts/restore', 'restore')->name('posts.restore');
});

Route::controller(TagController::class)->group(function (){
    Route::get('tags/index', 'index')->name('tags.index');
    Route::get('tags/create', 'create')->name('tags.create');
    Route::post('tags/store', 'store')->name('tags.store');
    Route::get('tags/edit/{tag}', 'edit')->name('tags.edit');
});

require __DIR__.'/auth.php';
