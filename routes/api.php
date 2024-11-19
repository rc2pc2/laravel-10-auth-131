<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\PostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/posts", [PostController::class, "index"])->name("api.posts.index");
Route::get("/posts/{post}", [PostController::class, "show"])->name("api.posts.show");
// Route::delete("/posts/{post}", [PostController::class, "destroy"])->name("api.posts.delete");

Route::get("/categories", [CategoryController::class, "index"])->name("api.categories.index");
Route::get("/categories/{category}", [CategoryController::class, "show"])->name("api.categories.show");

Route::post("/contact-us", [LeadController::class, "store"])->name("api.leads.store");
