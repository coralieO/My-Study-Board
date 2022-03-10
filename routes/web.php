<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware (['auth'])->group(function () {
    Route::get('/user/dashbord', [UserController::class, 'index']) ->name('User');
    Route::get('/admin/dashbord', [AdminController::class, 'index']) ->name('Admin');
    // Route::middleware(['role:user'])->group(function()
    // {
    //     Route::prefix('User')->group(function () {
    //     Route::resource('User', UserController::class);
    // });
    // });
    // Route::middleware(['role:admin'])->group(function()
    // {
    //     Route::prefix('Admin')->group(function () {
    //     Route::resource('Admin', AdminController::class);
    // });
    // });

});


