<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Guest\PostController as GuestPostController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// % rotte aperte a tutte/i
Route::name("guest.")->group(function(){
    Route::get('/', [GuestPostController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource("/posts", GuestPostController::class)->only(["index", "show"]);
});

// # rotte aperte esclusivamente a utenti loggati
Route::middleware("auth")->prefix("/admin")->name("admin.")->group(function(){
    Route::resource("/posts", AdminPostController::class)->withTrashed(["show"]);
});
