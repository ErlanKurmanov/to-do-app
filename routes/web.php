<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::resource('tasks', App\Http\Controllers\TaskController::class);
