<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TaskListController::class, 'index']);
Route::resource('tasks', TaskController::class);

//This method for retrieving data with js ajax:
Route::get('/tasks/list/{listId?}', [App\Http\Controllers\TaskListController::class, 'getTasks'])->name('tasks.byList');

//dd(route('lists.store'));
Route::post('/lists', [TaskListController::class, 'store'])->name('lists.store');

