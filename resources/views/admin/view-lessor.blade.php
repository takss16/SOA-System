@foreach($lessors as $lessor)
    <div>
        <h2>{{ $lessor->first_name }} {{ $lessor->last_name }}</h2>
        <!-- Display other lessor details as needed -->
    </div>
@endforeach
