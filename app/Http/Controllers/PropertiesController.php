<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{

    public function index()
{
    $user = auth()->user();


    $properties = $user->properties()->get();

    return view('lessor.properties', compact('properties'));
}
}
