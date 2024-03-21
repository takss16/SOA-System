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
            $idPhotoPath = $request->file('id_photo')->store('id_photos');
            $lessorProfile->id_photo = $idPhotoPath;

        }

        if ($request->hasFile('attached_documents')) {
            $attachedDocuments = [];
            foreach ($request->file('attached_documents') as $document) {
                $attachedDocumentPath = $document->store('attached_documents');
                $attachedDocuments[] = $attachedDocumentPath;
            }
            $lessorProfile->attached_documents = $attachedDocuments;
        }

<<<<<<< Updated upstream

        $user = new User([
            'name' => $validatedData['first_name'],
            'email' => $request->input('contact_email'),
            'password' => bcrypt('password'),
        ]);

        $user->save();

        $lessorProfile->user()->associate($user);
        $lessorProfile->save();


        $user->assignRole('lessor');
=======
        $lessorProfile->creatorUser()->associate($creatorUser);
        $lessorProfile->user()->associate($newUser);
        $lessorProfile->save();

        $newUser->assignRole('lessor');
>>>>>>> Stashed changes

        return redirect()->route('dashboard')->with('success', 'Lessor profile created successfully!');
    }


<<<<<<< Updated upstream
=======
    public function index()
    {
        $user = auth()->user();
        $lessorProfiles = $user->lessorProfilesCreated()->get();

        return view('admin.view-lessor', compact('lessorProfiles'));
    }

    public function show($id)
    {
        $lessorProfile = LessorProfile::findOrFail($id);

        return view('admin.view-profile', compact('lessorProfile'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
        ]);

        $lessorProfile = LessorProfile::findOrFail($id);

        $lessorProfile->update([
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

        $lessorProfile->save();

        return redirect()->route('dashboard')->with('success', 'Lessor profile updated successfully!');
    }

    public function destroy($id)
    {
        $lessorProfile = LessorProfile::findOrFail($id);

        $lessorProfile->delete();
        $user = User::find($lessorProfile->user_id);
        if ($user) {
            $user->delete();
        }
        return redirect()->route('dashboard')->with('success', 'Lessor profile deleted successfully!');
    }



>>>>>>> Stashed changes
}
