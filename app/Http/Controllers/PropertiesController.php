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

}
