<x-layout>
    <div class="col-lg-12 mt-3">
        <div class="text-end mt-2 mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#propertyModal">
            <i class="bi bi-plus"></i> Add Property
        </button>
        </div>
        <div class="modal fade" id="propertyModal" tabindex="-1" aria-labelledby="propertyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="propertyModalLabel">Add Property</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="propertyForm" action="{{ route('lessor.properties.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="building_unit" class="form-label">Building Unit</label>
                                        <input type="text" class="form-control" id="building_unit" name="building_unit">
                                    </div>
                                    <div class="mb-3">
                                        <label for="lot" class="form-label">Lot Number</label>
                                        <input type="text" class="form-control" id="lot" name="lot">
                                    </div>
                                    <div class="mb-3">
                                        <label for="block" class="form-label">Block</label>
                                        <input type="text" class="form-control" id="block" name="block">
                                    </div>
                                    <div class="mb-3">
                                        <label for="subdivision" class="form-label">Subdivision</label>
                                        <input type="text" class="form-control" id="subdivision" name="subdivision">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="barangay" class="form-label">Barangay</label>
                                        <input type="text" class="form-control" id="barangay" name="barangay">
                                    </div>
                                    <div class="mb-3">
                                        <label for="cityTown" class="form-label">City/Town</label>
                                        <input type="text" class="form-control" id="cityTown" name="cityTown">
                                    </div>
                                    <div class="mb-3">
                                        <label for="province" class="form-label">Province</label>
                                        <input type="text" class="form-control" id="province" name="province">
                                    </div>
                                    <div class="mb-3">
                                        <label for="region" class="form-label">Region</label>
                                        <input type="text" class="form-control" id="region" name="region">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" id="country" name="country">
                            </div>
                            <label for="property_description" class="form-label">Property Description</label>
                            <textarea class="form-control" id="property_description" name="property_description" rows="3"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="saveProperty">Save Property</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Properties</h5>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Property Description</th>
                                <th>Building Unit</th>
                                <th>LOT</th>
                                <th>BLOCK</th>
                                <th>Subdivision</th>
                                <th>Barangay</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $property)
                                <tr>
                                    <td>{{ $property->property_description }}</td>
                                    <td>{{ $property->building_unit }}</td>
                                    <td>{{ $property->lot }}</td>
                                    <td>{{ $property->block }}</td>
                                    <td>{{ $property->subdivision }}</td>
                                    <td>{{ $property->barangay}}</td>
                                    <td>
                                        <p>actions</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
</x-layout>
