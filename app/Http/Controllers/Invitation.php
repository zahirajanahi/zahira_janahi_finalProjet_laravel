<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function accept($id)
    {
        $invitation = Invitation::findOrFail($id);

        if (!$invitation->isPending()) {
            return response()->json(['message' => 'This invitation is no longer valid.'], 400);
        }

        $user = User::firstOrCreate(
            ['email' => $invitation->email],
            ['name' => explode('@', $invitation->email)[0]] 
        );

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