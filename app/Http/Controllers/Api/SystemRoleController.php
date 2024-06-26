<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SystemRole;
use Illuminate\Http\Request;

class SystemRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(SystemRole::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|unique:systemroles',
        ]);

        $systemRole = SystemRole::create($request->all());

        return response()->json($systemRole, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $systemRole = SystemRole::find($id);

        if (is_null($systemRole)) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        return response()->json($systemRole, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'role' => 'required|unique:systemroles,role,',
        ]);

        $systemRole = SystemRole::find($id);

        if (is_null($systemRole)) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        $systemRole->update($request->all());

        return response()->json($systemRole, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $systemRole = SystemRole::find($id);

        if (is_null($systemRole)) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        $systemRole->delete();

        return response()->json(null, 204);
    }
}
