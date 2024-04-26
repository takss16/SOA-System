<?php

namespace App\Http\Controllers;

use NumberFormatter;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Models\LesseeProfile;
use Rmunate\Utilities\SpellNumber;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

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
            'contract_terms' => 'nullable|numeric',
            'term_unit' => 'required|string|in:months,years',
            'lease_term_start_date' => 'nullable|date',
            'lease_term_end_date' => 'nullable|date',
            'rental_rate' => 'nullable|numeric',
            'rental_terms' => 'nullable|string',
            'deposit_advance' => 'nullable|numeric',
            'deposit_security' => 'nullable|numeric',
            'default_payment' => 'nullable|string',
            'contract_date' => 'nullable|date',
            'water_terms' => 'nullable|boolean',
            'electric_terms' => 'nullable|boolean',
            'internet_terms' => 'nullable|boolean',
            'internet_rate' => 'nullable|numeric',
            'water_rate' => 'nullable|numeric',
            'electric_rate' => 'nullable|numeric',
            'condition_of_premises' => 'nullable|string',
            'expiration_lease_penalty' => 'nullable|string',
            'judicial_relief_rate' => 'nullable|numeric',
            'witness_name_1' => 'nullable|string',
            'witness_name_2' => 'nullable|string',
        ]);

        $term = $validatedData['contract_terms'] . ' ' . $validatedData['term_unit'];

        $contract = new Contract([
            'property_id' => $validatedData['property_id'],
            'lessee_profile_id' => $validatedData['lessee_profile_id'],
            'contract_terms' => $term,
            'lease_term_start_date' => $validatedData['lease_term_start_date'],
            'lease_term_end_date' => $validatedData['lease_term_end_date'],
            'rental_rate' => $validatedData['rental_rate'],
            'rental_terms' => $validatedData['rental_terms'],
            'deposit_advance' => $validatedData['deposit_advance'],
            'deposit_security' => $validatedData['deposit_security'],
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

    public function generatePDF($id)
    {
        $contract = Contract::with('lesseeProfile', 'lessor', 'property', 'lessor.lessorProfiles')
            ->findOrFail($id);

        //advance and security
        $totalDeposit = $contract->deposit_advance + $contract->deposit_security;

        // Extract the numeric value of contract term
        preg_match('/(\d+)/', $contract->contract_terms, $matches);
        $totalTerm = (int) $matches[0];

        // Check if the term is in years and convert to months if necessary
        if (stripos($contract->contract_terms, 'year') !== false) {
            $totalTerm *= 12; // Convert years to months
        }

        // Get the numeric value of advance deposit
        $advanceDeposit = $contract->deposit_advance;

        // Calculate the starting month based on the advance deposit
        $startMonth = $totalTerm - $advanceDeposit + 1;

        // Generate the range of last months based on the advance deposit
        $lastMonths = range($startMonth, $totalTerm);

        // Convert number to word
        $formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        $Totaldept = ucfirst($formatter->format($totalDeposit));
        $rentalRate = ucfirst($formatter->format($contract->rental_rate));
        $depositAdvance = ucfirst($formatter->format($contract->deposit_advance));
        $depositSecurity = ucfirst($formatter->format($contract->deposit_security));
        $sum = ucfirst($formatter->format($contract->rental_rate * $totalDeposit));

        $pdf = PDF::loadView('lessor.contract-pdf', compact('contract', 'rentalRate', 'depositAdvance', 'sum', 'totalDeposit', 'depositSecurity', 'Totaldept', 'lastMonths'))->setPaper('legal');

        return $pdf->stream('contract.pdf');
    }

    // public function generatePDF($id)
    // {
    //     $contract = Contract::with('lesseeProfile', 'lessor', 'property', 'lessor.lessorProfiles')
    //                     ->findOrFail($id);

    //     // Extracting contract term and advance deposit values
    //     $contractTerm = $contract->contract_term;
    //     $advanceDeposit = $contract->deposit_advance;

    //     // Calculate the total contract term in months
    //     if ($contractTerm === 'by year') {
    //         // If contract term is by year, convert years to months
    //         $contractTermMonths = 12 * intval($advanceDeposit);
    //     } elseif ($contractTerm === 'by month') {
    //         // If contract term is by month, directly use the number of months
    //         $contractTermMonths = intval($advanceDeposit);
    //     } else {
    //         // Handle unexpected contract term values
    //         $contractTermMonths = 0;
    //     }

    //     // Calculate the last months to be covered by the advance deposit
    //     $lastMonths = [];
    //     for ($i = $contractTermMonths; $i > 0; $i--) {
    //         // Calculate the last month for each advance deposit month
    //         $lastMonth = 12 - $i + 1;

    //         // Adjust the last month based on the contract term
    //         if ($contractTerm === 'by year') {
    //             // Add 12 to the last month for each year
    //             $lastMonth += 12 * ($contract->contract_term - 1);
    //         }

    //         // Add the last month to the array
    //         $lastMonths[] = $lastMonth;
    //     }

    //     // Other conversions if needed (rental rate, deposit advance, etc.)
    //     $formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
    //     //     $Totaldept = ucfirst($formatter->format($totalDeposit));
    //     //     $rentalRate = ucfirst($formatter->format($contract->rental_rate));
    //     //     $depositAdvance = ucfirst($formatter->format($contract->deposit_advance));
    //     //     $depositSecurity = ucfirst($formatter->format($contract->deposit_security));
    //     //     $sum = ucfirst($formatter->format($contract->rental_rate * $totalDeposit));

    //     // Load the PDF view with all the necessary variables
    //     $pdf = PDF::loadView('lessor.contract-pdf', compact('contract', 'rentalRate', 'sum', 'totalDeposit', 'Totaldept', 'lastMonths'))->setPaper('legal');

    //     // Return the PDF stream
    //     return $pdf->stream('contract.pdf');
    // }
}
