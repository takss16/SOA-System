<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\LessorProfile;
use Spatie\Permission\Models\Role;

class LessorProfileController extends Controller
{
    public function profileForm()
    {
        return view('admin.create-lessor');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',

        ]);

        // Get the authenticated user
        $user = auth()->user();

        $lessorProfile = new LessorProfile([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'middle_name' => $request->input('middle_name'),
            'suffix' => $request->input('suffix'),
            'contact_email' => $request->input('contact_email'),
            'contact_phone' => $request->input('contact_phone'),
            'contact_tel' => $request->input('contact_tel'),
            'tin_number' => $request->input('tin_number'),
            'bir_name' => $request->input('bir_name'),
            'bir_registration_date' => $request->input('bir_registration_date'),
            'tax_type' => $request->input('tax_type'),
            'trade_name' => $request->input('trade_name'),
            'line_of_business' => $request->input('line_of_business'),
            'building_number' => $request->input('building_number'),
            'street' => $request->input('street'),
            'barangay' => $request->input('barangay'),
            'city' => $request->input('city'),
            'province' => $request->input('province'),
            'country' => $request->input('country'),
        ]);

        if ($request->hasFile('id_photo')) {
            $idPhotoPath = $request->file('id_photo')->store('id_photos', 'public');
            $lessorProfile->id_photo = $idPhotoPath;
        }

        if ($request->hasFile('attached_documents')) {
            $attachedDocuments = [];
            foreach ($request->file('attached_documents') as $document) {
                $attachedDocumentPath = $document->store('attached_documents', 'public');
                $attachedDocuments[] = $attachedDocumentPath;
            }
            $lessorProfile->attached_documents = $attachedDocuments;
        }

        // Associate the lessor profile with the authenticated user
        $lessorProfile->user()->associate($user);
        $lessorProfile->save();

        $user = new User([
            'name' => $validatedData['first_name'],
            'email' => $request->input('contact_email'),
            'password' => bcrypt('password'),
        ]);
        $user->save();


        $user->assignRole('lessor');

        return redirect()->route('dashboard')->with('success', 'Lessor profile created successfully!');
    }

    public function index()
    {
        // Assuming you have authentication set up
        $user = auth()->user();
        // Assuming 'lessorProfiles' is the relationship method defined in the User model
        $lessorProfiles = $user->lessorProfiles()->get();

        return view('admin.view-lessor', compact('lessorProfiles'));
    }

    public function show($id)
    {
        // Find the lessor profile by its ID
        $lessorProfile = LessorProfile::findOrFail($id);

        // Return the view with the lessor profile data
        return view('admin.view-profile', compact('lessorProfile'));
    }



}
