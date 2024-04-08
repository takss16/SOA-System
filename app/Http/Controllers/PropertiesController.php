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
    $validatedData = $request->validate([
        'building_unit' => 'required|string',
        'property_description' => 'required|string',
        'lot' => 'required|string',
        'block' => 'required|string',
        'subdivision' => 'required|string',
        'barangay' => 'required|string',
        'cityTown' => 'required|string',
        'province' => 'required|string',
        'region' => 'required|string',
        'country' => 'required|string',
    ]);
    $userId = auth()->id();
    $property = new Properties($validatedData);
    $property->user_id = $userId;
    $property->save();

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
