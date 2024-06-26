<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api;
use App\Models\GameMatch;
use Illuminate\Http\Request;


class GameMatchController extends Controller
{
    /**
     * Returns a list of all games.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = GameMatch::all();
        return response()->json(['data' => $games], 200);
    }

    /**
     * Stores a new game.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'location_id' => 'required|exists:locations,id',
            'status' => 'required',
        ]);

        $gamematch = GameMatch::create($validatedData);

        return response()->json(['message' => 'Game match created successfully', 'data' => $gamematch], 201);
    }

    /**
     * Returns the details of a specific game.
     *
     * @param  \App\Models\GameMatch  $game
     * @return \Illuminate\Http\Response
     */
    public function show(GameMatch $gamematch)
    {
        return response()->json(['data' => $gamematch], 200);
    }

    /**
     * Updates the information of an existing game.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GameMatch  $gamematch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GameMatch $gamematch)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'location_id' => 'required|exists:locations,id',
            'status' => 'required',
        ]);

        $gamematch->update($validatedData);

        return response()->json(['message' => 'Game match updated successfully', 'data' => $gamematch], 200);
    }

    /**
     * Removes the specified game from the database.
     *
     * @param  \App\Models\GameMatch  $gameamtch
     * @return \Illuminate\Http\Response
     */
    public function destroy(GameMatch $game)
    {
        $game->delete();

        return response()->json(['message' => 'Game match deleted successfully'], 204);
    }
}
