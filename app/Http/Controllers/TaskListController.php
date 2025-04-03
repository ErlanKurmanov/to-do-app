<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    public function index()
    {
        $tasklists = TaskList::all();
        $tasks = Task::all();

//        dd($tasks);
        return view('index', ['tasklists' => $tasklists, 'tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        TaskList::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'Task list created successfully!');
    }
}
