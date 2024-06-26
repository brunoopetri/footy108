<?php

namespace App\Http\Controllers\Api;

use App\Models\Participation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ParticipationController extends Controller
{
    /**
     * Returns a list of all participation confirmations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participation = Participation::all();
        return response()->json(['data' => $participation], 200);
    }

    /**
     * Stores a new participation confirmation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Data validation
        $request->validate([
            'confirmation_status' => ['required', Rule::in(['yes', 'no'])],
            'user_id' => 'nullable|exists:users,id',
            'game_id' => 'nullable|exists:games,id',
        ]);

        // Create participation confirmation
        $participation = Participation::create($request->all());

        return response()->json(['message' => 'Participation created successfully', 'data' => $participation], 201);
    }

    /**
     * Returns the details of a specific participation.
     *
     * @param  \App\Models\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function show(Participation $participation)
    {
        return response()->json(['data' => $participation], 200);
    }

    /**
     * Updates the information of an existing participation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participation $participation)
    {
        // Data validation
        $request->validate([
            'confirmation_status' => ['required', Rule::in(['yes', 'no'])],
            'user_id' => 'nullable|exists:users,id',
            'game_id' => 'nullable|exists:games,id',
        ]);

        // Update participation 
        $participation->update($request->all());

        return response()->json(['message' => 'Participation updated successfully', 'data' => $participation], 200);
    }

    /**
     * Removes the specified participation from the database.
     *
     * @param  \App\Models\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participation $participation)
    {
        // Delete participation
        $participation->delete();

        return response()->json(['message' => 'Participation deleted successfully'], 204);
    }
}
