<!-- <div class="card rounded-md shadow-md overflow-hidden hover:shadow-lg" style="width: 100%;">
    <div class="img-wrap overflow-hidden"
        style="background-size: cover; background-repeat: no-repeat; background-position: center; background-size: cover">
        @if ($logo)
            <img src="../img/{{ $logo }}" class="h-28 rounded-md mx-auto" />
        @else
            <div class="placeholder-logo p-4">
                <img src="../img/placeholder/placeholder.jpeg" class="h-28 rounded-md mx-auto" />
            </div>
        @endif
    </div>
    <div class="card-body text-center">
        <h5 class="font-bold card-title text-green-600">{{ $name }}</h5>
        <p class="card-text text-xs">{{ $industry }}</p>
        <a href="/viewBusiness/{{ $id }}"
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 w-full">View</a>
    </div>
</div>
 -->

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
                <a href="/viewBusiness/{{ $id }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-md font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 w-full">View</a>
            </div>
        </div>
    </div>
</div>