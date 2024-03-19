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
                        <form id="propertyForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="buildingUnit" class="form-label">Building Unit</label>
                                        <input type="text" class="form-control" id="buildingUnit" name="buildingUnit">
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
                            <div class="mb-3">
                                <label for="propertyDescription" class="form-label">Property Description</label>
                                <textarea class="form-control" id="propertyDescription" name="propertyDescription" rows="3"></textarea>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveProperty">Save Property</button>
                    </div>
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
                                    <td>{{ $property->barangay}}</td>
                                    <td>{{ $property->created_at->format('Y-m-d') }}</td>
                                    <td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
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
