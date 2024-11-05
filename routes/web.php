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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/posts", [GuestPostController::class, "index"])->name("guest.posts.index");
Route::get("/posts/{post}", [GuestPostController::class, "show"])->name("guest.posts.show");

Route::prefix("/admin")->name("admin.")->group(function(){
    Route::get("/posts", [AdminPostController::class, "index"])->name("posts.index");
    Route::post("/posts", [AdminPostController::class, "store"])->name("posts.store");
    Route::get("/posts/create", [AdminPostController::class, "create"])->name("posts.create");
    Route::delete("/posts/{post}", [AdminPostController::class, "destroy"])->name("posts.delete");
    Route::put("/posts/{post}", [AdminPostController::class, "update"])->name("posts.update");
    Route::get("/posts/{post}", [AdminPostController::class, "show"])->name("posts.show");
    Route::get("/posts/{post}/edit", [AdminPostController::class, "edit"])->name("posts.edit");
});
