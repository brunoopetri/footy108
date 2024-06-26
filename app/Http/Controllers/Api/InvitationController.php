<?php

namespace App\Http\Controllers\Api;

use App\Models\Invitation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvitationController extends Controller
{
    /**
     * Display a listing of the invitations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invitations = Invitation::all();
        return response()->json(['data' => $invitations], 200);
    }

    /**
     * Store a newly created invitation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate data
        $request->validate([
            'gamematch_id' => 'required|exists:gamematches,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        // Create invitation
        $invitation = Invitation::create($request->all());

        return response()->json(['message' => 'Invitation created successfully', 'data' => $invitation], 201);
    }

    /**
     * Display the specified invitation.
     *
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function show(Invitation $invitation)
    {
        return response()->json(['data' => $invitation], 200);
    }

    /**
     * Update the specified invitation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invitation $invitation)
    {
        // Validate data
        $request->validate([
            'gamematch_id' => 'required|exists:gamematches,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        // Update invitation
        $invitation->update($request->all());

        return response()->json(['message' => 'Invitation updated successfully', 'data' => $invitation], 200);
    }

    /**
     * Remove the specified invitation from storage.
     *
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invitation $invitation)
    {
        $invitation->delete();

        return response()->json(['message' => 'Invitation deleted successfully'], 204);
    }
}

