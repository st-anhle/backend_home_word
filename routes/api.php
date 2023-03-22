<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Models\User;
use App\Http\Resources\UserResource;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('users', UserController::class);

Route::apiResource('tasks', TaskController::class);

Route::get('/search/{tittle}', [TaskController::class, 'searchByTittle']);

Route::get('/filter/type/{type}/status/{status}', [TaskController::class, 'filter']); 

Route::get('/usertest/{id}', function ($id) {
    return new UserResource(User::findOrFail($id));
});