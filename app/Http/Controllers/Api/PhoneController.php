<?php

namespace App\Http\Controllers\Api;

use App\Models\Phone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhoneController extends Controller
{
    /**
     * Returns a list of all phones.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = Phone::all();
        return response()->json(['data' => $phones], 200);
    }

    /**
     * Stores a new phone.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Data validation
        $request->validate([
            'phone' => 'required|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        // Create phone
        $phone = Phone::create($request->all());

        return response()->json(['message' => 'Phone created successfully', 'data' => $phone], 201);
    }

    /**
     * Returns the details of a specific phone.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        return response()->json(['data' => $phone], 200);
    }

    /**
     * Updates the information of an existing phone.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phone $phone)
    {
        // Data validation
        $request->validate([
            'phone' => 'required|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        // Update phone
        $phone->update($request->all());

        return response()->json(['message' => 'Phone updated successfully', 'data' => $phone], 200);
    }

    /**
     * Removes the specified phone from the database.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        // Delete phone
        $phone->delete();

        return response()->json(['message' => 'Phone deleted successfully'], 204);
    }
}
