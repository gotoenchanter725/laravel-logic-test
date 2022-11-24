<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\UserManageController;

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
    return view('pages.home');
})->name('base_url');

Route::get("/register", [UserController::class, 'page']);
Route::post("/register", [UserController::class, 'create'])->name('registration');
Route::get('/check/{link}', [UserController::class, 'check']);

Route::middleware(['auth.check'])->get("/main", [UserController::class, 'main'])->name('main');

// admin
Route::middleware(['auth.check', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource("/users", UserManageController::class);
});