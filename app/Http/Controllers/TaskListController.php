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

    public function getTasksById($listId = null)
    {
        if ($listId === 'all') {
            $tasks = Task::all();
        } else {
            $tasks = Task::where('list_id', $listId)->get();
        }

        return response()->json([
            'tasks' => $tasks
        ]);
    }

    public function showList($listId = null)
    {
        $tasklists = TaskList::all();

        if ($listId) {
            $tasks = Task::where('list_id', $listId)->get();
            $currentList = TaskList::find($listId);
        } else {
            $tasks = Task::all();
            $currentList = null;
        }

        return view('index', [
            'tasklists' => $tasklists,
            'tasks' => $tasks,
            'currentList' => $currentList
        ]);
    }

    public function destroy(string $id)
    {
        TaskList::destroy($id);
        return redirect()->back()->with('Deleted Successfully!');

    }
}
