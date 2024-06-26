<?php

namespace App\Http\Controllers\Api;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Returns a list of all teams.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return response()->json(['data' => $teams], 200);
    }

    /**
     * Stores a new team.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Data validation
        $request->validate([
            'name' => 'required|max:255',
            'color' => 'required|max:255',
            'score' => 'required|integer',
        ]);

        // Create team
        $team = Team::create($request->all());

        return response()->json(['message' => 'Team created successfully', 'data' => $team], 201);
    }

    /**
     * Returns the details of a specific team.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return response()->json(['data' => $team], 200);
    }

    /**
     * Updates the information of an existing team.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        // Data validation
        $request->validate([
            'name' => 'required|max:255',
            'color' => 'required|max:255',
            'score' => 'required|integer',
        ]);

        // Update team
        $team->update($request->all());

        return response()->json(['message' => 'Team updated successfully', 'data' => $team], 200);
    }

    /**
     * Removes the specified team from the database.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        // Delete team
        $team->delete();

        return response()->json(['message' => 'Team deleted successfully'], 204);
    }
}