@section('content')
    <div class="container">
        <h1>Search Results for "{{ $query }}" @if ($industry) in {{ $industry }} industry @endif</h1>
        <div class="grid grid-cols-3 gap-4">
            @foreach($results as $result)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-lg font-semibold">{{ $result->business_name }}</h2>
                    <!-- Add other information as needed -->
               jhsjkhuahwuilhiuh
                </div>
            @endforeach
        </div>
    </div>
@endsection
