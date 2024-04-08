<x-layout>
    <div class="col-lg-12 mt-3">
        <div class="mt-2">
            <div class="card">
                <div class="card-body mb-2">
                    <div class="card">
                        <div class="card-header">
                            Property Details
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#updatePropertyModal">
                                Update
                            </button>
                            <button type="button" class="btn btn-danger float-end me-2" data-bs-toggle="modal" data-bs-target="#deletePropertyModal">
                                Delete
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <strong>Building Unit:</strong> {{ $property->building_unit }}
                            </div>
                            <div class="mb-3">
                                <strong>Property Description:</strong> {{ $property->property_description }}
                            </div>
                            <!-- Add more property details here -->
                            <div class="mb-3">
                                <strong>Lot:</strong> {{ $property->lot }}
                            </div>
                            <div class="mb-3">
                                <strong>Block:</strong> {{ $property->block }}
                            </div>
                            <div class="mb-3">
                                <strong>Subdivision:</strong> {{ $property->subdivision }}
                            </div>
                            <div class="mb-3">
                                <strong>Barangay:</strong> {{ $property->barangay }}
                            </div>
                            <div class="mb-3">
                                <strong>City/Town:</strong> {{ $property->city_town }}
                            </div>
                            <div class="mb-3">
                                <strong>Province:</strong> {{ $property->province }}
                            </div>
                            <div class="mb-3">
                                <strong>Region:</strong> {{ $property->region }}
                            </div>
                            <div class="mb-3">
                                <strong>Country:</strong> {{ $property->country }}
                            </div>
                            <!-- End of property details -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Update Property Modal -->
<div class="modal fade" id="updatePropertyModal" tabindex="-1" aria-labelledby="updatePropertyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatePropertyModalLabel">Update Property Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for updating property details -->
                <form action="{{ route('lessor.properties.update', ['id' => $property->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="building_unit" class="form-label">Building Unit</label>
                        <input type="text" class="form-control" id="building_unit" name="building_unit" value="{{ $property->building_unit }}">
                    </div>

                    <!-- Add other fields for property details here -->
                    <div class="mb-3">
                        <label for="property_description" class="form-label">Property Description</label>
                        <input type="text" class="form-control" id="property_description" name="property_description" value="{{ $property->property_description }}">
                    </div>
                    <div class="mb-3">
                        <label for="lot" class="form-label">Lot</label>
                        <input type="text" class="form-control" id="lot" name="lot" value="{{ $property->lot }}">
                    </div>
                    <div class="mb-3">
                        <label for="block" class="form-label">Block</label>
                        <input type="text" class="form-control" id="block" name="block" value="{{ $property->block }}">
                    </div>
                    <div class="mb-3">
                        <label for="subdivision" class="form-label">Subdivision</label>
                        <input type="text" class="form-control" id="subdivision" name="subdivision" value="{{ $property->subdivision }}">
                    </div>
                    <div class="mb-3">
                        <label for="barangay" class="form-label">Barangay</label>
                        <input type="text" class="form-control" id="barangay" name="barangay" value="{{ $property->barangay }}">
                    </div>
                    <div class="mb-3">
                        <label for="cityTown" class="form-label">City/Town</label>
                        <input type="text" class="form-control" id="cityTown" name="cityTown" value="{{ $property->city_town}}">
                    </div>
                    <div class="mb-3">
                        <label for="province" class="form-label">Province</label>
                        <input type="text" class="form-control" id="province" name="province" value="{{ $property->province }}">
                    </div>
                    <div class="mb-3">
                        <label for="region" class="form-label">Region</label>
                        <input type="text" class="form-control" id="region" name="region" value="{{ $property->region }}">
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country" value="{{ $property->country }}">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Property</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete Property Modal -->
<div class="modal fade" id="deletePropertyModal" tabindex="-1" aria-labelledby="deletePropertyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePropertyModalLabel">Delete Property</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this property?
            </div>
            <div class="modal-footer">
                <form action="{{ route('lessor.properties.destroy', ['id' => $property->id]) }}" method="POST">

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


</x-layout>
