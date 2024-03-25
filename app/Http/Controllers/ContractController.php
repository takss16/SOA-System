<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LesseeProfile;

class ContractController extends Controller
{
    public function create(Request $request)
    {
        $properties = $request->user()->properties;

        $lesseeProfileId = $request->query('lessee_profile_id');

        $lesseeProfile = LesseeProfile::findOrFail($lesseeProfileId);

        return view('lessor.contracts-create', compact('lesseeProfile', 'properties'));
    }
}
