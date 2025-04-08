<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;

            // Operations with tasks:
//Creates a new task:
Route::post('/task', [TaskController::class, 'store'])->name('task.store');

//Is task completed checkbox
Route::put('/tasks/{id}', [TaskController::class, 'isCompleted'])->name('task.isCompleted');

//update task
Route::put('/task/{id}', [TaskController::class, 'update'])->name('task.update');

//Deletes task
Route::delete('tasks/{taskId}', [TaskController::class, 'destroy'])->name('tasks.destroy');



            // Operations with lists:

// Create a new list:
Route::post('/lists', [TaskListController::class, 'store'])->name('lists.store');

//Retrieves all tasks and lists
Route::get('/', [TaskListController::class, 'index']);

//Retrieves tasks depending on the list:
Route::get('/list/{listId?}', [App\Http\Controllers\TaskListController::class, 'showList'])
    ->name('list.show');

Route::delete('/list/{id}', [TaskListController::class, 'destroy'])->name('list.destroy');



