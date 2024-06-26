<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Place;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Location::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'capacity' => 'nullable|integer',
            'other_relevant_details' => 'nullable|string',
            'game_id' => 'required|exists:games,id',
        ]);

        $place = Location::create($request->all());

        return response()->json($place, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $location = Location::find($id);

        if (is_null($location)) {
            return response()->json(['message' => 'Location not found'], 404);
        }

        return response()->json($location, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'capacity' => 'nullable|integer',
            'other_relevant_details' => 'nullable|string',
            'game_id' => 'required|exists:games,id',
        ]);

        $location = Location::find($id);

        if (is_null($location)) {
            return response()->json(['message' => 'Location not found'], 404);
        }

        $location->update($request->all());

        return response()->json($location, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $location = Location::find($id);

        if (is_null($location)) {
            return response()->json(['message' => 'Location not found'], 404);
        }

        $location->delete();

        return response()->json(null, 204);
    }
}
