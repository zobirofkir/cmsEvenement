<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthReset;
use App\Http\Controllers\AuthRouteController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\RouteController;
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


Route::get("/", [RouteController::class, "index"])->name("dashboard");

Route::get("/login", [RouteController::class,"login"])->name("login");
Route::post("/login", [AuthController::class,"login"])->name("login");

Route::get("/register", [RouteController::class,"register"])->name("register");
Route::post("/register", [AuthController::class,"register"])->name('register');

Route::get("/logout", [AuthController::class,"logout"])->name('logout');

Route::get('/users/reset/password', [AuthReset::class, 'indexReset'])->name('password.reset');
Route::post('/users/reset', [AuthReset::class, 'forgotPassword'])->name('password.reset');


Route::get('/users/reset', [AuthReset::class, 'indexUpdate'])->name('password.update');
Route::post('/users/reset/{token}', [AuthReset::class, 'resetPassword'])->name('password.update');





Route::apiResource("/users/dashboard", RessourceController::class);

Route::get("/users/dashboard/live-server/{projectId}", [RessourceController::class, "liveServer"]);

