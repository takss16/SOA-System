<x-layout>
    <div class="col-lg-12 mt-3">
        <div class="mt-2">
            <div class="card">
                <div class="card-body mb-2">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h5 class="card-title">Create Contract</h5>
                    <form action="{{ route('lessor.contract.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="lessee_profile_id" value="{{ $lessee_profile->id }}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="property_id" class="form-label">Select Property</label>
                                    <select class="form-select" id="property_id" name="property_id" required>
                                        <option value="" selected disabled>Select Property</option>
                                        @foreach($properties as $property)
                                            <option value="{{ $property->id }}">{{ $property->building_unit }} {{ $property->lot }}, {{ $property->block }}, {{ $property->subdivision }}, {{ $property->barangay }}, {{ $property->cityTown }}, {{ $property->province }}, {{ $property->region }}, {{ $property->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="rental_rate" class="form-label">Rental Rate</label>
                                    <input type="number" class="form-control" id="rental_rate" name="rental_rate" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="rental_terms" class="form-label">Rental Terms</label>
                                    <input type="text" class="form-control" id="rental_terms" name="rental_terms">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="deposit_advance" class="form-label">Deposit Advance</label>
                                    <input type="number" class="form-control" id="deposit_advance" name="deposit_advance" step="0.01">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="deposit_security" class="form-label">Deposit Security</label>
                                    <input type="number" class="form-control" id="deposit_security" name="deposit_security" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="contract_terms" class="form-label">Contract Terms</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="contract_terms" name="contract_terms" aria-describedby="term-addon">
                                        <select class="form-select" id="term-addon" name="term_unit">
                                            <option value="months">Months</option>
                                            <option value="years">Years</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="default_payment" class="form-label">Default Payment</label>
                                    <input type="text" class="form-control" id="default_payment" name="default_payment">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="deposit_advance" class="form-label">contract date</label>
                                    <input type="date" class="form-control" id="contract_date" name="contract_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="lease_term_start_date" class="form-label">Lease Term Start Date</label>
                                    <input type="date" class="form-control" id="lease_term_start_date" name="lease_term_start_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="lease_term_end_date" class="form-label">Lease Term End Date</label>
                                    <input type="date" class="form-control" id="lease_term_end_date" name="lease_term_end_date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Water Terms</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="water_terms" id="water_terms_yes" value="1">
                                        <label class="form-check-label" for="water_terms_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="water_terms" id="water_terms_no" value="0" checked>
                                        <label class="form-check-label" for="water_terms_no">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Electric Terms</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="electric_terms" id="electric_terms_yes" value="1">
                                        <label class="form-check-label" for="electric_terms_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="electric_terms" id="electric_terms_no" value="0" checked>
                                        <label class="form-check-label" for="electric_terms_no">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Internet Terms</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="internet_terms" id="internet_terms_yes" value="1">
                                        <label class="form-check-label" for="internet_terms_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="internet_terms" id="internet_terms_no" value="0" checked>
                                        <label class="form-check-label" for="internet_terms_no">No</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="internet_rate" class="form-label">Internet Rate</label>
                                    <input type="number" class="form-control" id="internet_rate" name="internet_rate" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="water_rate" class="form-label">Water Rate</label>
                                    <input type="number" class="form-control" id="water_rate" name="water_rate" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="electric_rate" class="form-label">Electric Rate</label>
                                    <input type="number" class="form-control" id="electric_rate" name="electric_rate" step="0.01">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="condition_of_premises" class="form-label">Condition of Premises</label>
                                    <textarea class="form-control" id="condition_of_premises" name="condition_of_premises" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="expiration_lease_penalty" class="form-label">Expiration Lease Penalty</label>
                                    <textarea class="form-control" id="expiration_lease_penalty" name="expiration_lease_penalty" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="judicial_relief_rate" class="form-label">Judicial Relief Rate</label>
                                    <input type="number" class="form-control" id="judicial_relief_rate" name="judicial_relief_rate" step="0.01">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="witness_name_1" class="form-label">Witness Name 1</label>
                                    <input type="text" class="form-control" id="witness_name_1" name="witness_name_1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="witness_name_2" class="form-label">Witness Name 2</label>
                                    <input type="text" class="form-control" id="witness_name_2" name="witness_name_2">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="lessor_document" class="form-label">Lessor Document</label>
                                    <input type="file" class="form-control" id="lessor_document" name="lessor_document">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="lessee_document" class="form-label">Lessee Document</label>
                                    <input type="file" class="form-control" id="lessee_document" name="lessee_document">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="lessor_id_photo" class="form-label">Lessor ID Photo</label>
                                    <input type="file" class="form-control" id="lessor_id_photo" name="lessor_id_photo">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="lessor_id_type" class="form-label">Lessor ID Type</label>
                                    <input type="text" class="form-control" id="lessor_id_type" name="lessor_id_type">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="lessor_id_number" class="form-label">Lessor ID Number</label>
                                    <input type="text" class="form-control" id="lessor_id_number" name="lessor_id_number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="lessor_id_issued_date" class="form-label">Lessor ID Issued Date</label>
                                    <input type="date" class="form-control" id="lessor_id_issued_date" name="lessor_id_issued_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="lessee_id_photo" class="form-label">Lessee ID Photo</label>
                                    <input type="file" class="form-control" id="lessee_id_photo" name="lessee_id_photo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="lessee_id_type" class="form-label">Lessee ID Type</label>
                                    <input type="text" class="form-control" id="lessee_id_type" name="lessee_id_type">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="lessee_id_number" class="form-label">Lessee ID Number</label>
                                    <input type="text" class="form-control" id="lessee_id_number" name="lessee_id_number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="lessee_id_issued_date" class="form-label">Lessee ID Issued Date</label>
                                    <input type="date" class="form-control" id="lessee_id_issued_date" name="lessee_id_issued_date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tax_terms" class="form-label">Tax Terms</label>
                                    <textarea class="form-control" id="tax_terms" name="tax_terms" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tax_rate" class="form-label">Tax Rate</label>
                                    <input type="number" class="form-control" id="tax_rate" name="tax_rate" step="0.01">
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-primary" type="submit">Submit Contract</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
