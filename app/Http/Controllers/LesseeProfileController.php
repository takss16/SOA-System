<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Models\LesseeProfile;


class LesseeProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('lessor.create-lessee');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'contact_email' => 'required|string',
        ]);


        $creatorUser = auth()->user();


        $newUser = new User([
            'name' => $validatedData['first_name'],
            'email' => $request->input('contact_email'),
            'password' => bcrypt('password'),
        ]);
        $newUser->save();

        $lesseeProfile = new LesseeProfile([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'middle_name' => $request->input('middle_name'),
            'suffix' => $request->input('suffix'),
            'spouse' => $request->input('spouse'),
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
            $lesseeProfile->id_photo = $idPhotoPath;
        }

        if ($request->hasFile('attached_documents')) {
            $attachedDocuments = [];
            foreach ($request->file('attached_documents') as $document) {
                $attachedDocumentPath = $document->store('attached_documents', 'public');
                $attachedDocuments[] = $attachedDocumentPath;
            }
            $lesseeProfile->attached_documents = json_encode($attachedDocuments);
        }


        $lesseeProfile->creatorUser()->associate($creatorUser);
        $lesseeProfile->user()->associate($newUser);
        $lesseeProfile->save();

        // Assign a role to the new user
        $newUser->assignRole('lessee');

        return redirect()->route('dashboard')->with('success', 'Lessor profile created successfully!');
    }

    public function showLessee()
    {
        $user = auth()->user();
        $lesseeProfiles = $user->lesseeProfilesCreated()->get();


        return view('lessor.view-lessee', compact('lesseeProfiles'));
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lesseeProfile = LesseeProfile::findOrFail($id);
        $attachedDocuments = json_decode($lesseeProfile->attached_documents, true);
        return view('lessor.lessee-profile', compact('lesseeProfile', 'attachedDocuments'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
        ]);

        $lesseeProfile = LesseeProfile::findOrFail($id);

        // Update profile fields
        $lesseeProfile->update([
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

        // Update ID photo if provided
        if ($request->hasFile('id_photo')) {
            $idPhotoPath = $request->file('id_photo')->store('id_photos', 'public');
            $lesseeProfile->id_photo = $idPhotoPath;
        }

        // Update attached documents if provided
        if ($request->hasFile('attached_documents')) {
            $attachedDocuments = [];
            foreach ($request->file('attached_documents') as $document) {
                $attachedDocumentPath = $document->store('attached_documents', 'public');
                $attachedDocuments[] = $attachedDocumentPath;
            }
            $lesseeProfile->attached_documents = $attachedDocuments;
        }

        // Save the updated profile
        $lesseeProfile->save();

        return redirect()->route('dashboard')->with('success', 'Lessor profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lesseeProfile = LesseeProfile::findOrFail($id);

        $lesseeProfile->delete();
        $user = User::find($lesseeProfile->user_id);
        if ($user) {
            $user->delete();
        }
        return redirect()->route('dashboard')->with('success', 'Lessor profile deleted successfully!');
    }
}
