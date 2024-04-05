<x-layout>
    <div class="col-lg-12 mt-3">
        <section class="section">
            <div class="row">
              <div class="col-lg-12">

                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Datatables</h5>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Line of Business</th>
                                <th>Lot Number</th>
                                <th>Start Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lessorProfiles as $lessorProfile)
                            <tr>
                                <td>{{ $lessorProfile->first_name }} {{ $lessorProfile->last_name }}</td>
                                <td>{{ $lessorProfile->contact_email }}</td>
                                <td>{{ $lessorProfile->contact_phone }}</td>
                                <td>{{ $lessorProfile->line_of_business }}</td>
                                <td>{{ $lessorProfile->building_number }} {{ $lessorProfile->street }}, {{ $lessorProfile->barangay }}, {{ $lessorProfile->city }}</td>
                                <td>{{ $lessorProfile->created_at->format('Y/m/d') }}</td>
                                <td>
                                    <a href="{{ route('admin.profile.show', $lessorProfile->id) }}" class="btn btn-outline-primary">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </section>
    </div>
</x-layout>
