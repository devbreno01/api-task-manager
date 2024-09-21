<?php

use App\Http\Controllers\api\TaskController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\api\TasksController;
use App\Http\Controllers\api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

   /* Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum'); */


   Route::get('/', [HomeController::class, 'index'])->name('home');

   //Responsáveis
   Route::get('/users', [UserController::class, 'showAll']);
   Route::get('/user/{id}', [UserController::class, 'show']);
   Route::post('/user/create', [UserController::class, 'store']);
   Route::put('/user/{id}', [UserController::class, 'update']);
   Route::delete('/user/{id}', [UserController::class, 'destroy']);

    //Category
    Route::post('/category/create', [CategoryController::class, 'store']);
    Route::put('/category/{id}', [CategoryController::class, 'update']);
    Route::get('/category/{id}', [CategoryController::class, 'show']);
    Route::get('/categories', [CategoryController::class, 'showAll']);
    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

    //task
    Route::post('/task/create', [TaskController::class, 'store']);
    Route::put('/task/{id}', [TaskController::class, 'update']);
    Route::get('/task/{id}', [TaskController::class, 'show']);
    Route::get('/tasks', [TaskController::class, 'showAll']);
    Route::delete('/task/{id}', [TaskController::class, 'destroy']);

    //logica
    Route::get('/start/task/{id}', [TaskController::class, 'startTask']);
    Route::get('/pause/task/{id}', [TaskController::class, 'pauseTask']);
    Route::get('/unpause/task/{id}', [TaskController::class, 'unpauseTask']);
    Route::get('/finish/task/{id}', [TaskController::class, 'finishTask']);




