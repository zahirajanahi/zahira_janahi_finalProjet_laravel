<?php

namespace App\Http\Controllers;

use App\Mail\TeamInvitation;
use App\Models\Invitation;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    public function store(Request $request ,Team $teamId)
    {
        //
        $request->validate([
            'email'=>'required'
        ]);


        $team = Team::where('id', $teamId->id)->first();

        $user = auth()->user();

        $email = $team->users->pluck('email')->first();

        if ($email == $request->email) {
            return back()->with('error', "you can't invite your self");
        }

        $existingMember = $team->users()->where('email', $request->email)->exists();
        if ($existingMember) {
            return back()->with('error', "you are already a member here");

        }


        $invitation = Invitation::create([
            'team_id' => $team->id,
            'email' => $request->email,
            'invited_by' => $user->id,
        ]);

        Mail::to($request->email)->send(new TeamInvitation($invitation));


        return back()->with('success','message invitation');

    }

    public function accept($id)
    {
        $invitation = Invitation::findOrFail($id);

        if (!$invitation->isPending()) {
            return response()->json(['message' => 'This invitation is no longer valid.'], 400);
        }

        $user = Auth::user() ?? User::firstOrCreate(
            ['email' => $invitation->email],
            ['name' => explode('@', $invitation->email)[0]]
        );

        if ($invitation->team->members()->where('user_id', $user->id)->exists()) {
            return response()->json(['message' => 'You are already a member of this team.'], 400);
        }

        $invitation->team->members()->attach($user->id, ['role' => 'member']);
        $invitation->update(['status' => 'accepted']);

        return response()->json(['message' => 'You have successfully joined the team.']);
    }

    public function reject($id)
    {
        $invitation = Invitation::findOrFail($id);

        if (!$invitation->isPending()) {
            return response()->json(['message' => 'This invitation is no longer valid.'], 400);
        }

        $invitation->update(['status' => 'rejected']);

        return response()->json(['message' => 'Invitation rejected successfully.']);
    }
}