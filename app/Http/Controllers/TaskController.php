<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class TaskController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personalTasks = auth()->user()->tasks;
        return view('task.index'  ,compact('personalTasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Task $task )
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start' => 'required|date',
            'end' => 'required|date',
            'priority' => 'required|in:low,medium,high',
            'team_id' => 'nullable|exists:teams,id',
            'assigned_to' => 'nullable|exists:users,id',
        ]);




        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'start' => $request->start,
            'end' => $request->end,
            'priority' => $request->priority,
            'user_id' => auth()->id(),
            'team_id' => $request->team_id,
            'assigned_to' => $request->assigned_to,
        ]);


    


        return redirect()->route('task.index', $task);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
  
    /**
     * Update the specified resource in storage.
     */
    
 public function edit(Task $task)
{
    return view('tasks.index', [
        'personalTasks' => Task::all(), // Or your logic to fetch tasks
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

    return redirect()->route('tasks.personal.index')->with('success', 'Task updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

      return back();
    }
}
