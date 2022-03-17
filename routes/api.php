<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserTaskController;
use App\Http\Controllers\User\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware (['auth'])->group(function () {
//     Route::middleware(['role:user'])->group(function(){
//     Route::prefix('/user')->group(function(){
//     // Route::get('/dashboard', [UserController::class, 'index']) ->name('User');
//     Route::post('/task/store', [UserTaskController::class, 'UserTaskController@store']) ->name('Task.store');
//     Route::get('/task/create', [UserTaskController::class, 'UserTaskController@create']) ->name('Task.create');
//     Route::put('/task/{id}', [UserTaskController::class, 'UserTaskController@update']) ->name('Task.update');
//     Route::delete('/task/delete/{id}', [UserTaskController::class, 'UserTaskController@destroy']) ->name('Task.delete');
// });
// // Route::middleware(['role:admin'])->group(function(){
// //     Route::prefix('/admin')->group(function(){
// //     // Route::get('/dashboard', [UserController::class, 'index']) ->name('User');
// //     Route::post('/task/store', [UserTaskController::class, 'UserTaskController@store']) ->name('Task.store');
// //     Route::put('/task/{id}', [UserTaskController::class, 'UserTaskController@create']) ->name('Task.create');
// //     Route::delete('/task/delete/{id}', [UserTaskController::class, 'UserTaskController@destroy']) ->name('Task.delete');
// // });
// });
// });
