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
            'role' => 'required|unique:system_roles',
        ]);

        $systemRole = SystemRole::create($request->all());

        return response()->json(['message' => 'Role created successfully','data' => $systemRole], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(SystemRole $systemRole)
    {
        return response()->json($systemRole, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SystemRole $systemRole)
    {
        $request->validate([
            'role' => 'required|unique:system_roles,role,' . $systemRole->id,
        ]);

        $systemRole->update($request->all());

        return response()->json(['message' => 'Role updated successfully','data' => $systemRole], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SystemRole $systemRole)
    {

        $systemRole->delete();

        return response()->json(['message' => 'Role deleted successfully'], 204);
    }
}
