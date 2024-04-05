<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use App\Models\LesseeProfile;

class ContractController extends Controller
{
    public function create(LesseeProfile $lessee_profile)
    {
        $properties = auth()->user()->properties;

        return view('lessor.contracts-create', compact('lessee_profile', 'properties'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'lessee_profile_id' => 'required|exists:lessee_profiles,id',
            'contract_terms' => 'nullable|string',
            'lease_term_start_date' => 'nullable|date',
            'lease_term_end_date' => 'nullable|date',
            'rental_rate' => 'nullable|numeric',
            'rental_terms' => 'nullable|string',
            'deposit_advance' => 'nullable|numeric',
            'deposit_security' => 'nullable|numeric',
            'deposit_damage' => 'nullable|numeric',
            'default_payment' => 'nullable|string',
            'contract_date' => 'nullable|date',
            'water_terms' => 'nullable|string',
            'electric_terms' => 'nullable|string',
            'internet_terms' => 'nullable|string',
            'internet_rate' => 'nullable|numeric',
            'water_rate' => 'nullable|numeric',
            'electric_rate' => 'nullable|numeric',
            'condition_of_premises' => 'nullable|string',
            'expiration_lease_penalty' => 'nullable|string',
            'judicial_relief_rate' => 'nullable|numeric',
            'witness_name_1' => 'nullable|string',
            'witness_name_2' => 'nullable|string',
        ]);

        $contract = new Contract([
            'property_id' => $validatedData['property_id'],
            'lessee_profile_id' => $validatedData['lessee_profile_id'],
            'contract_terms' => $validatedData['contract_terms'],
            'lease_term_start_date' => $validatedData['lease_term_start_date'],
            'lease_term_end_date' => $validatedData['lease_term_end_date'],
            'rental_rate' => $validatedData['rental_rate'],
            'rental_terms' => $validatedData['rental_terms'],
            'deposit_advance' => $validatedData['deposit_advance'],
            'deposit_security' => $validatedData['deposit_security'],
            'deposit_damage' => $validatedData['deposit_damage'],
            'default_payment' => $validatedData['default_payment'],
            'contract_date' => $validatedData['contract_date'],
            'water_terms' => $validatedData['water_terms'],
            'electric_terms' => $validatedData['electric_terms'],
            'internet_terms' => $validatedData['internet_terms'],
            'internet_rate' => $validatedData['internet_rate'],
            'water_rate' => $validatedData['water_rate'],
            'electric_rate' => $validatedData['electric_rate'],
            'condition_of_premises' => $validatedData['condition_of_premises'],
            'expiration_lease_penalty' => $validatedData['expiration_lease_penalty'],
            'judicial_relief_rate' => $validatedData['judicial_relief_rate'],
            'witness_name_1' => $validatedData['witness_name_1'],
            'witness_name_2' => $validatedData['witness_name_2'],
            'lessor_id' => auth()->id(),
        ]);

        if ($request->hasFile('lessor_document')) {
            $lessorDocumentPath = $request->file('lessor_document')->store('public/lessor_documents');
            $contract->lessor_document = $lessorDocumentPath;
        }

        if ($request->hasFile('lessee_document')) {
            $lesseeDocumentPath = $request->file('lessee_document')->store('public/lessee_documents');
            $contract->lessee_document = $lesseeDocumentPath;
        }

        if ($request->hasFile('lessor_id_photo')) {
            $lessorIdPhotoPath = $request->file('lessor_id_photo')->store('public/lessor_id_photos');
            $contract->lessor_id_photo = $lessorIdPhotoPath;
        }

        if ($request->hasFile('lessee_id_photo')) {
            $lesseeIdPhotoPath = $request->file('lessee_id_photo')->store('public/lessee_id_photos');
            $contract->lessee_id_photo = $lesseeIdPhotoPath;
        }

        $contract->save();

        return redirect()->back()->with('success', 'Contract created successfully!');
    }

    public function showContracts($lesseeProfileId)
    {
        $contracts = Contract::with('lesseeProfile', 'lessor', 'property', 'lessor.lessorProfiles')
                        ->where('lessee_profile_id', $lesseeProfileId)
                        ->get();

        return view('lessor.contracts-show', compact('contracts'));
    }



}
