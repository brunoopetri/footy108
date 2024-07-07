<?php

namespace App\Http\Controllers\Api;

use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlayerController extends Controller
{
    /**
     * Returns a list of all players.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        return response()->json(['data' => $players], 200);
    }

    /**
     * Stores a new player.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Data validation
        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'user_id' => 'required|exists:users,id',
            'position_id' => 'required|exists:positions,id',
        ]);

        // Verificar se o usuário tem a função 'admin' ou 'player'
        $user = User::find($request->user_id);
        if ($user && !in_array($user->systemroles->role, ['admin', 'player'])) {
            return response()->json(['message' => 'User does not have the role of admin or player'], 403);
        }

        // Create player
        $player = Player::create($request->all());

        return response()->json(['message' => 'Player created successfully', 'data' => $player], 201);
    }

    /**
     * Returns the details of a specific player.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return response()->json(['data' => $player], 200);
    }

    /**
     * Updates the information of an existing player.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        // Data validation
        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'user_id' => 'required|exists:users,id',
            'position_id' => 'required|exists:positions,id',
        ]);

        // Verificar se o usuário tem a função 'admin' ou 'player'
        $user = User::find($request->user_id);
        if ($user && !in_array($user->systemroles->role, ['admin', 'player'])) {
            return response()->json(['message' => 'User does not have the role of admin or player'], 403);
        }

        // Update player
        $player->update($request->all());

        return response()->json(['message' => 'Player updated successfully', 'data' => $player], 200);
    }

    /**
     * Removes the specified player from the database.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        // Delete player
        $player->delete();

        return response()->json(['message' => 'Player deleted successfully'], 204);
    }
}
