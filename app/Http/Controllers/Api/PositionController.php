<?php

namespace App\Http\Controllers\Api;

use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    /**
     * Returns a list of all positions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();
        return response()->json(['data' => $positions], 200);
    }

    /**
     * Stores a new position.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Data validation
        $request->validate([
            'position_name' => 'required|max:255',
        ]);

        // Create position
        $position = Position::create($request->all());

        return response()->json(['message' => 'Position created successfully', 'data' => $position], 201);
    }

    /**
     * Returns the details of a specific position.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        return response()->json(['data' => $position], 200);
    }

    /**
     * Updates the information of an existing position.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        // Data validation
        $request->validate([
            'position_name' => 'required|max:255',
        ]);

        // Update position
        $position->update($request->all());

        return response()->json(['message' => 'Position updated successfully', 'data' => $position], 200);
    }

    /**
     * Removes the specified position from the database.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        // Delete position
        $position->delete();

        return response()->json(['message' => 'Position deleted successfully'], 204);
    }
}
