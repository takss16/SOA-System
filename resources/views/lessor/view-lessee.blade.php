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
                            @foreach ( $lesseeProfiles as $lesseeProfile)
                            <tr>
                                <td>{{$lesseeProfile->first_name }} {{$lesseeProfile->last_name }}</td>
                                <td>{{$lesseeProfile->contact_email }}</td>
                                <td>{{$lesseeProfile->contact_phone }}</td>
                                <td>{{$lesseeProfile->line_of_business }}</td>
                                <td>{{$lesseeProfile->building_number }} {{$lesseeProfile->street }}, {{$lesseeProfile->barangay }}, {{$lesseeProfile->city }}</td>
                                <td>{{$lesseeProfile->created_at->format('Y/m/d') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Actions
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('lessor.profile.show', $lesseeProfile->id) }}">View</a>
                                            <a class="dropdown-item" href="{{ route('lessor.contracts.create', ['lessee_profile' => $lesseeProfile->id]) }}">Create Contract</a>
                                            <a class="dropdown-item" href="{{ route('lessor.contracts.show', ['lesseeProfileId' => $lesseeProfile->id]) }}">View Contracts</a>
                                        </div>
                                      </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>
