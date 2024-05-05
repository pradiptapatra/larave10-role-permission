<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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


Route::group(['middleware'=>'auth'],function () {
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

Route::group(['middleware'=>['auth']],function () {
    Route::get('role', function() {
        dd("hi");
    })->middleware("permission:add-post");

    Route::get('roles', [HomeController::class, 'roles'])->name('roles.list');
    Route::get('roles/create', [HomeController::class, 'createRole'])->name('roles.create');

    Route::get('users', [UserController::class, 'users'])->name('users.list');
    Route::get('users/create', [UserController::class, 'userCreate'])->name('users.create');
    Route::post('users/store', [UserController::class, 'userStore'])->name('users.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
