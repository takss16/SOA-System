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
                    <h5 class="card-title">Create Contract</h5>
                    <!-- Custom Styled Validation -->
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
                                <label for="deposit_damage" class="form-label">Deposit Damage</label>
                                <input type="number" class="form-control" id="deposit_damage" name="deposit_damage" step="0.01">
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
                                <label for="contract_terms" class="form-label">Contract Terms</label>
                                <textarea class="form-control" id="contract_terms" name="contract_terms" rows="3"></textarea>
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
                                <label for="water_terms" class="form-label">Water Terms</label>
                                <textarea class="form-control" id="water_terms" name="water_terms" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="electric_terms" class="form-label">Electric Terms</label>
                                <textarea class="form-control" id="electric_terms" name="electric_terms" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="internet_terms" class="form-label">Internet Terms</label>
                                <textarea class="form-control" id="internet_terms" name="internet_terms" rows="3"></textarea>
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
                                <input type="text" class="form-control" id="lessor_document" name="lessor_document">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="lessee_document" class="form-label">Lessee Document</label>
                                <input type="text" class="form-control" id="lessee_document" name="lessee_document">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="lessor_id_photo" class="form-label">Lessor ID Photo</label>
                                <input type="text" class="form-control" id="lessor_id_photo" name="lessor_id_photo">
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
                                <input type="text" class="form-control" id="lessee_id_photo" name="lessee_id_photo">
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
