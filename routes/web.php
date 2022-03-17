<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminTaskController;
use App\Http\Controllers\User\UserTaskController;


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
    Route::middleware(['role:user'])->group(function(){

        Route::prefix('/user')->group(function(){
        Route::get('/dashboard', [UserTaskController::class, 'index']) ->name('User');
        // Route::get('/dashboard', [UserController::class, 'index']) ->name('User');
        Route::post('/task/store', [UserTaskController::class, 'store']) ->name('user.task.store');
        Route::get('/task/create', [UserTaskController::class, 'create']) ->name('user.task.create');
        Route::get('/task/{id}', [UserTaskController::class, 'show']) ->name('user.task.show');
        Route::get('/task/{id}/edit', [UserTaskController::class, 'edit']) ->name('user.task.edit');
        Route::put('/task/{id}/update', [UserTaskController::class, 'update']) ->name('user.task.update');
        Route::delete('/task/delete/{id}', [UserTaskController::class, 'destroy']) ->name('user.task.delete');
    });
    });
    Route::middleware(['role:admin'])->group(function(){

            Route::prefix('/admin')->group(function(){
            //Tasks
            Route::get('/tasks', [AdminTaskController::class, 'index']) ->name('adminTask');
            Route::post('/task/store', [AdminTaskController::class, 'store']) ->name('admin.task.store');
            Route::get('/task/create', [AdminTaskController::class, 'create']) ->name('admin.task.create');
            Route::get('/task/{id}', [AdminTaskController::class, 'show']) ->name('admin.task.show');
            Route::get('/task/{id}/edit', [AdminTaskController::class, 'edit']) ->name('admin.task.edit');
            Route::put('/task/{id}/update', [AdminTaskController::class, 'update']) ->name('admin.task.update');
            Route::delete('/task/{id}/delete', [AdminTaskController::class, 'destroy']) ->name('admin.task.delete');
            //Manage users
            Route::get('/manageUsers', [AdminController::class, 'index']) ->name('Admin');
            Route::get('/user/{id}/edit', [AdminController::class, 'edit']) ->name('admin.user.edit');
            Route::put('/user/{id}/update', [AdminController::class, 'update']) ->name('admin.user.update');
            Route::delete('/user/{id}/delete', [AdminController::class, 'destroy']) ->name('admin.user.delete');
        });
    });
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


