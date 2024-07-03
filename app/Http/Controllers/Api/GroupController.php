<?php

namespace App\Http\Controllers\Api;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    /**
     * Returns a list of all groups.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        return response()->json(['data' => $groups], 200);
    }

    /**
     * Stores a new group.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Data validation
        $request->validate([
            'name' => 'required|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        // Ensure the user is a player
        $user = User::find($request->user_id);
        if ($user->role !== 'player') {
            return response()->json(['message' => 'User must be a player'], 422);
        }

        // Create group
        $group = Group::create($request->all());

        return response()->json(['message' => 'Group created successfully', 'data' => $group], 201);
    }

    /**
     * Returns the details of a specific group.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return response()->json(['data' => $group], 200);
    }

    /**
     * Updates the information of an existing group.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        // Data validation
        $request->validate([
            'name' => 'required|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        // Ensure the user is a player
        $user = User::find($request->user_id);
        if ($user->role !== 'player') {
            return response()->json(['message' => 'User must be a player'], 422);
        }

        // Update group
        $group->update($request->all());

        return response()->json(['message' => 'Group updated successfully', 'data' => $group], 200);
    }

    /**
     * Removes the specified group from the database.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        // Delete group
        $group->delete();

        return response()->json(['message' => 'Group deleted successfully'], 204);
    }
}
