<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Display tasks for the authenticated user
    public function index()
    {
        $tasks = auth()->user()->tasks; 
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'deadline' => 'required|date|after:today',
            'priority' => 'required|in:low,medium,high',
        ]);

        auth()->user()->tasks()->create($request->all());

        return redirect()->back()->with('success', 'Task created successfully!');
    }

    // Mark a task as completed
    public function markAsCompleted(Task $task)
    {
        $this->authorize('update', $task); // Ensure user owns the task
        $task->update(['is_done' => true]);

        return redirect()->back()->with('success', 'Task marked as completed!');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task); // Ensure user owns the task
        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully!');
    }
}
