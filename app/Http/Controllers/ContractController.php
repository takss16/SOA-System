<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LesseeProfile;

class ContractController extends Controller
{
    public function create(Request $request)
    {
$properties = $request->user()->properties;
         dd($properties);
        $lesseeProfileId = $request->query('lessee_profile_id');
        $lesseeProfile = LesseeProfile::findOrFail($lesseeProfileId);

        return view('contracts.create', compact('lesseeProfile', 'properties'));
    }
}
