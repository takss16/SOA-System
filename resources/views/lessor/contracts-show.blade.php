<x-layout>
    <div class="col-lg-12 mt-3">
        <section class="section">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Contracts</h5>
                    <table class="table datatable">
                        <thead>
                            <tr>

                                <th>Contract Terms</th>
                                <th>Property Description</th>
                                <th>Lessee Name</th>
                                <th>Lessor Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contracts as $contract)
                                <tr>

                                    <td>{{ $contract->contract_terms }}</td>
                                    <td>{{ $contract->property->property_description }}</td>
                                    <td>{{ $contract->lesseeProfile->first_name }}
                                        {{ $contract->lesseeProfile->middle_name }}
                                        {{ $contract->lesseeProfile->last_name }}
                                    </td>
                                    <td>{{ $contract->lessor->lessorProfiles->first_name }}
                                        {{ $contract->lessor->lessorProfiles->middle_name }}
                                        {{ $contract->lessor->lessorProfiles->last_name }}
                                    </td>
                                    <td>
                                        <p>action</p>
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
