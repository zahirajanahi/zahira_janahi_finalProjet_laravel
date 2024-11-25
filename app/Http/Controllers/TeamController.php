<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class TeamController extends Controller
{
    public function index()
    { 
        $users = Auth::user();
        $user = auth()->user();
        $teams = Team::where("owner_id", $user->id)->get();
        return view('team.index', compact('teams','users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $user = auth()->user();
        $teamCount = $user->ownedTeams()->count();

        if ($teamCount >= 5 && !$user->isSubscribed()) {
            session([
                'pending_team' => [
                    'name' => $request->name,
                    'description' => $request->description
                ]
            ]);
            
            return redirect()->route('subscription.show');
        }

        $team = Team::create([
            'name' => $request->name,
            'description' => $request->description,
            'owner_id' => $user->id,
        ]);

        $team->users()->attach($user, ["role" => "owner"]);

        return back()->with('success', 'Team created successfully!');
    }

    public function getTasks(Team $team)
    {
        // Ensure the user is a member of the team
        if (!$team->users()->where('user_id', auth()->id())->exists()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $tasks = $team->tasks()
            ->with('assignedUser')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($task) {
                return [
                    'id' => $task->id,
                    'name' => $task->name,
                    'description' => $task->description,
                    'priority' => $task->priority,
                    'start' => $task->start,
                    'end' => $task->end,
                    'status' => $task->status,
                    'assigned_to' => $task->assigned_to,
                    'assigned_user' => $task->assignedUser ? [
                        'id' => $task->assignedUser->id,
                        'name' => $task->assignedUser->name
                    ] : null
                ];
            });

        return response()->json($tasks);
    }

    public function show(Team $team)
    {
        // Ensure the user is a member of the team
        if (!$team->users()->where('user_id', auth()->id())->exists()) {
            return redirect()->route('team.index')->with('error', 'You are not a member of this team.');
        }

        return view('team.show', compact('team'));
    }
    
    public function destroy(Team $team)
{
    // Check if the authenticated user is the owner of the team
    if (auth()->id() !== $team->owner_id) {
        return redirect()->route('team.index')->with('error', 'You do not have permission to delete this team.');
    }

    // Delete the team
    $team->delete();

    return redirect()->route('team.index')->with('success', 'Team deleted successfully!');
}


}