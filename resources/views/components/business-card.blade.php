@php
    $option = 1;
@endphp
@if ($option === 1)
    <div class="max-w-sm lg:max-w-sm rounded-md overflow-hidden bg-white shadow-md hover:shadow-lg border p-4">
        <div class="max-w-sm lg:max-w-sm rounded bg-white overflow-hidden">
            <div class="card-content">
                <div class="relative">
                    @if ($logo)
                        <img src="../img/{{ $logo }}" class="bizlogo w-full object-cover" />
                    @else
                        <div class="placeholder-logo p-4">
                            <img src="../img/placeholder/placeholder.jpeg" class="h-28 rounded-md mx-auto" />
                        </div>
                    @endif
                </div>
                <div class="card-body text-center">
                    <div class="font-bold card-title text-xl text-green-600">{{ $name }}</div>
                    <p class="card-text text-xs">{{ $industry }}</p>
                </div>
                <div class="">
<<<<<<< Updated upstream
                    <a href="business/{{ $name }}"
=======
                    <a href="/business/{{ $name }}"
>>>>>>> Stashed changes
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-md font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 w-full">View</a>
                </div>
            </div>
        </div>
    </div>
@elseif ($option === 2)
    <div class="max-w-xs bg-white shadow-lg rounded-lg overflow-hidden my-10">
        <div class="px-4 py-2">
            <h6 class="text-gray-900 font-bold text-xl uppercase">{{ $name }}</h6>
        </div>
        <img class="h-56 w-full object-cover mt-2" src="../img/{{ $logo }}" alt="{{ $name }}">
        <div class="flex items-center justify-between px-4 py-2 bg-gray-900">
            <button class="px-3 py-1 bg-gray-200 text-sm text-gray-900 font-semibold rounded">Add to card</button>
        </div>
    </div>
@endif
