<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;



Route::resource('tasks', TaskController::class);


//Retrieves all tasks and lists
Route::get('/', [TaskListController::class, 'index']);

//Retrieves tasks depending on the list:
Route::get('/tasks/list/{listId?}', [App\Http\Controllers\TaskListController::class, 'getTasksById']);

//Updating checkbox
Route::post('/lists', [TaskListController::class, 'store'])->name('lists.store');


