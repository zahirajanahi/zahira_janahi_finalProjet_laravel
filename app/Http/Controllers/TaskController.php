<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // Only fetch personal tasks (where team_id is null)
        $personalTasks = auth()->user()->tasks()->whereNull('team_id')->get();
        return view('task.index', compact('personalTasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start' => 'required|date',
            'end' => 'required|date',
            'priority' => 'required|in:low,medium,high',
            'team_id' => 'nullable|exists:teams,id',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $task = Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'start' => $request->start,
            'end' => $request->end,
            'priority' => $request->priority,
            'user_id' => auth()->id(),
            'team_id' => $request->team_id,
            'assigned_to' => $request->assigned_to,
            'status' => 'pending'
        ]);

        // Redirect based on whether it's a team task or personal task
        if ($request->team_id) {
            return redirect()->route('team.index')->with('success', 'Team task created successfully!');
        }

        return redirect()->route('task.index')->with('success', 'Personal task created successfully!');
    }

    public function edit(Task $task)
    {
        return view('tasks.index', [
            'personalTasks' => Task::whereNull('team_id')->get(),
            'task' => $task
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'deadline' => 'required|date',
        ]);

        $task->update($validated);

        return redirect()->route('task.index')->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        
        $isTeamTask = $task->team_id !== null;
        $task->delete();

        if ($isTeamTask) {
            return redirect()->route('team.index')->with('success', 'Team task deleted successfully!');
        }
        
        return redirect()->route('task.index')->with('success', 'Task deleted successfully!');
    }
}