<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Charts / ApexCharts - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">


  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">


  <link href="{{asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>
    @include('layouts.headers')

  <main id="main" class="main">
    <div class="col-lg-12 mt-3">
        <div class="mt-2">
            <div class="card">
                <div class="card-body mb-2">
                    <h5 class="card-title">Lessee Profile</h5>
                    <div class="row mb-4">
                        <div class="col-md-6">
                        <p><strong>Name:</strong> {{ $lesseeProfile->first_name }} {{ $lesseeProfile->last_name }}</p>
                        <p><strong>Spouse:</strong> {{ $lesseeProfile->spouse }}</p>
                        <p><strong>Email:</strong> {{ $lesseeProfile->contact_email }}</p>
                        <p><strong>Contact Number:</strong> {{ $lesseeProfile->contact_phone }}</p>
                        </div>
                        <div class="col-md-6">
                        <p><strong>Line of Business:</strong> {{ $lesseeProfile->line_of_business }}</p>
                        <p><strong>Address:</strong> {{ $lesseeProfile->building_number }}, {{ $lesseeProfile->street }}, {{ $lesseeProfile->barangay }}, {{ $lesseeProfile->city }}</p>
                        <p><strong>Start Date:</strong> {{ $lesseeProfile->created_at ? \Carbon\Carbon::parse($lesseeProfile->created_at)->formatLocalized('%B %d, %Y') : 'N/A' }}</p>
                        </div>
                    </div>
                    <!-- Additional Information -->
                    <div class="mb-4">
                        <h6 class="card-subtitle mb-2 text-muted">Additional Information</h6>
                        <p><strong>TIN Number:</strong> {{ $lesseeProfile->tin_number }}</p>
                        <p><strong>BIR Name:</strong> {{ $lesseeProfile->bir_name }}</p>
                        <p><strong>Tax Type:</strong> {{ $lesseeProfile->tax_type }}</p>
                        <p><strong>BIR Registration Date:</strong> {{ $lesseeProfile->bir_registration_date ? \Carbon\Carbon::parse($lesseeProfile->bir_registration_date)->format('F j, Y') : 'N/A' }}</p>
                    </div>
                    {{-- <div class="mb-4">
                        <h6 class="card-subtitle mb-2 text-muted">Address</h6>
                        <p>{{ $lesseeProfile->building_number }} {{ $lesseeProfile->street }}, {{ $lesseeProfile->barangay }}, {{ $lesseeProfile->city }}, {{ $lesseeProfile->province }}, {{ $lesseeProfile->country }}</p>
                    </div> --}}
                    <div class="row">
                        <!-- ID Photo -->
                        <div class="mb-4 col-6" style="height: 200px;">
                            <h6 class="card-subtitle mb-2 text-muted">ID Photo</h6>
                            @if($lesseeProfile->id_photo)
                            <img src="{{ asset('storage/' . $lesseeProfile->id_photo) }}" alt="ID Photo" class="img-fluid h-100">
                            @else
                            <p class="h-100 d-flex align-items-center justify-content-center">No photo available</p>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="attached_documents" class="form-label">Attached Documents</label>
                            <input type="file" class="form-control" id="attached_documents" name="attached_documents[]" multiple>
                            @if(isset($attachedDocuments) && count($attachedDocuments) > 0)
                            <ul>
                                @foreach($attachedDocuments as $document)
                                    <li><a href="{{ asset('storage/' . $document) }}">{{ $document }}</a></li>
                                @endforeach
                            </ul>
                        @else
                            <p>No documents attached</p>
                        @endif
                        </div>
                    </div>
                    <div class="row mt-5 ">
                        <div class="col-6 mx-auto text-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateProfileModal{{$lesseeProfile->id}}">
                                Update Profile
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{$lesseeProfile->id}}">
                                <i class="bi bi-trash-fill"></i> Delete Profile
                            </button>
                        </div>
                    </div>

                    <div class="modal fade" id="confirmDeleteModal{{$lesseeProfile->id}}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{$lesseeProfile->id}}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteModalLabel{{$lesseeProfile->id}}">Confirm Deletion</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this profile?
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{ route('lessor.lessee-profiles.destroy', $lesseeProfile->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal fade" id="updateProfileModal{{$lesseeProfile->id}}" tabindex="-1" aria-labelledby="updateProfileModal{{$lesseeProfile->id}}Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateProfileModal{{$lesseeProfile->id}}Label">Update Profile</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('lessor.lessee-profiles.update', $lesseeProfile->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label for="first_name" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="first_name" value="{{$lesseeProfile->first_name}}" name="first_name" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="last_name" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="last_name" value="{{$lesseeProfile->last_name}}" name="last_name" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="middle_name" class="form-label">Middle Name</label>
                                                <input type="text" class="form-control" id="middle_name" value="{{$lesseeProfile->last_name}}" name="middle_name">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="suffix" class="form-label">Suffix</label>
                                                <input type="text" class="form-control" id="suffix" value="{{$lesseeProfile->suffix}}" name="suffix">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="suffix" class="form-label">Spouse</label>
                                                <input type="text" class="form-control" id="spouse" value="{{$lesseeProfile->spouse}}" name="spouse">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="contact_email" class="form-label">Contact Email</label>
                                                <input type="email" class="form-control" id="contact_email" value="{{$lesseeProfile->contact_email}}" name="contact_email" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="contact_phone" class="form-label">Contact Phone</label>
                                                <input type="text" class="form-control" id="contact_phone"  value="{{$lesseeProfile->contact_phone}}" name="contact_phone" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="contact_tel" class="form-label">Contact Tel</label>
                                                <input type="text" class="form-control" id="contact_tel" value="{{$lesseeProfile->contact_tel}}" name="contact_tel">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="tin_number" class="form-label">TIN Number</label>
                                                <input type="text" class="form-control" id="tin_number" value="{{$lesseeProfile->tin_number}}" name="tin_number">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="bir_name" class="form-label">BIR Name</label>
                                                <input type="text" class="form-control" id="bir_name" value="{{$lesseeProfile->bir_name}}" name="bir_name">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="bir_registration_date" class="form-label">BIR Registration Date</label>
                                                <input type="date" class="form-control" id="bir_registration_date" value="{{$lesseeProfile->bir_registration_date}}" name="bir_registration_date">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="tax_type" class="form-label">Tax Type</label>
                                                <input type="text" class="form-control" id="tax_type" value="{{$lesseeProfile->tax_type}}" name="tax_type">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="trade_name" class="form-label">Trade Name</label>
                                                <input type="text" class="form-control" id="trade_name" value="{{$lesseeProfile->trade_name}}" name="trade_name">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="line_of_business" class="form-label">Line of Business</label>
                                                <input type="text" class="form-control" id="line_of_business" value="{{$lesseeProfile->line_of_business}}" name="line_of_business">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="building_number" class="form-label">Building Number</label>
                                                <input type="text" class="form-control" id="building_number" value="{{$lesseeProfile->building_number}}" name="building_number">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="street" class="form-label">Street</label>
                                                <input type="text" class="form-control" id="street" value="{{$lesseeProfile->street}}" name="street">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="barangay" class="form-label">Barangay</label>
                                                <input type="text" class="form-control" id="barangay" value="{{$lesseeProfile->barangay}}" name="barangay">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="city" class="form-label">City</label>
                                                <input type="text" class="form-control" id="city" value="{{$lesseeProfile->city}}" name="city">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="province" class="form-label">Province</label>
                                                <input type="text" class="form-control" id="province" value="{{$lesseeProfile->province}}" name="province">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="country" class="form-label">Country</label>
                                                <input type="text" class="form-control" id="country" value="{{$lesseeProfile->country}}" name="country">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 ">
                                                    <label for="id_photo" class="form-label">ID Photo</label>
                                                    <input type="file" class="form-control" id="id_photo" name="id_photo">
                                                    @if ($lesseeProfile->id_photo)
                                                        <p>Current ID Photo:</p>
                                                        <img src="{{ asset('storage/' . $lesseeProfile->id_photo) }}" alt="Current ID Photo" style="max-width: 100%;">
                                                    @else
                                                        <p>No ID Photo uploaded.</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="attached_documents" class="form-label">Attached Documents</label>
                                                    <input type="file" class="form-control" id="attached_documents" name="attached_documents[]" multiple>

                                                    @if ($lesseeProfile->attached_documents && count(json_decode($lesseeProfile->attached_documents)) > 0)
                                                        <p>Current Attached Documents:</p>
                                                        <ul>
                                                            @foreach(json_decode($lesseeProfile->attached_documents) as $document)
                                                            <li>{{ $document }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <p>No Attached Documents uploaded.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Add more input fields for other profile data -->

                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>
