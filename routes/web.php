<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TaskListController::class, 'index']);
Route::resource('tasks', TaskController::class);

Route::post('/lists', [TaskListController::class, 'store'])->name('tasks.store');

