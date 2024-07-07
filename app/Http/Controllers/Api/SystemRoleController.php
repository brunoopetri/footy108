<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SystemRole;
use Illuminate\Http\Request;

class SystemRoleController extends Controller
{
    public function index()
    {
        return response()->json(SystemRole::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|unique:systemroles',
        ]);

        $systemRole = SystemRole::create($request->all());

        return response()->json(['message' => 'Role created successfully', 'data' => $systemRole], 201);
    }

    public function show(SystemRole $systemRole)
    {
        return response()->json($systemRole, 200);
    }

    public function update(Request $request, SystemRole $systemRole)
    {
        $request->validate([
            'role' => 'required|unique:systemroles,role,' . $systemRole->id,
        ]);

        $systemRole->update($request->all());

        return response()->json(['message' => 'Role updated successfully', 'data' => $systemRole], 200);
    }

    public function destroy(SystemRole $systemRole)
    {
        $systemRole->delete();
        return response()->json(['message' => 'Role deleted successfully'], 204);
    }
}