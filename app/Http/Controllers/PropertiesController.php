<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Properties;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{


    public function index()
{
    $user = auth()->user();


    $properties = $user->properties()->get();

    return view('lessor.properties', compact('properties'));
}

public function store(Request $request)
{
    // Validate only 'building_unit' and 'property_description'
    $validatedData = $request->validate([
        'building_unit' => 'required|string',
        'property_description' => 'required|string',
    ]);

    // Retrieve authenticated user ID
    $userId = auth()->id();

    // Create new Properties instance
    $property = new Properties();

    // Assign validated data to the model
    $property->building_unit = $validatedData['building_unit'];
    $property->property_description = $validatedData['property_description'];

    // Assign additional fields directly from the request
    $property->lot = $request->input('lot');
    $property->block = $request->input('block');
    $property->subdivision = $request->input('subdivision');
    $property->barangay = $request->input('barangay');
    $property->cityTown = $request->input('cityTown');
    $property->province = $request->input('province');
    $property->region = $request->input('region');
    $property->country = $request->input('country');

    // Assign user ID and save the model
    $property->user_id = $userId;
    $property->save();

    // Redirect with success message
    return redirect()->route('dashboard')->with('success', 'Property added successfully!');
}

public function show($id)
{
    $property = Properties::findOrFail($id);

      return view('lessor.properties-show', compact('property'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'building_unit' => 'required|string',
        'property_description' => 'required|string',

    ]);

    $property = Properties::findOrFail($id);

    // Update property fields
    $property->update([
        'building_unit' => $validatedData['building_unit'],
        'property_description' => $validatedData['property_description'],
        'lot' => $request->input('lot'),
        'block' => $request->input('block'),
        'subdivision' => $request->input('subdivision'),
        'barangay' => $request->input('barangay'),
        'city_town' => $request->input('cityTown'),
        'province' => $request->input('province'),
        'region' => $request->input('region'),
        'country' => $request->input('country'),
    ]);

    return redirect()->route('dashboard')->with('success', 'Property updated successfully!');
}
public function destroy($id)
{
    $property = Properties::findOrFail($id);

    // Delete the property
    $property->delete();

    // Redirect back with a success message
    return redirect()->route('dashboard')->with('success', 'Property deleted successfully!');
}



}
