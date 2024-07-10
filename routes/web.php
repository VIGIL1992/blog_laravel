<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/home', function () {
//     return view('index');
// });

// Route::ge are(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/404', [ProfileController::class, 'load404'])->name('profile.edit');


Route::get('admin/home',[AdminController::class,'loadHomePage'])->middleware('admin');
Route::get('user/home',[UserController::class,'loadHomePage'])->middleware('user');

Route::get('my/posts', [UserController::class,'loadMyPosts'])->middleware('user');
Route::get('create/post', [UserController::class,'loadCreatePost'])->middleware('user');
