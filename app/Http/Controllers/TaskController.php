<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'list_id' => 'required|exists:lists,id',
        ]);

        Task::create($validated);

        return redirect()->back()->with('success', 'To-Do Created Successfully!');
    }


    public function isCompleted(Request $request, string $id)
    {
        $task = Task::find($id);

        if ($request->has('completed')) {
            $task->update([
                'completed' => $request->completed
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Task status updated successfully!'
            ]);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'list_id' => $request->list_id,
        ]);

        return redirect()->back()->with('success', 'To-Do Created Successfully!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::destroy($id);
        return redirect()->back()->with('Deleted Successfully!');
    }

}
