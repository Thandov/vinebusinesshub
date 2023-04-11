<h1 class="md:col-span-2 font-black text-3xl py-3">Location</h1>
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
    <div class="col-span-6 sm:col-span-12 lg:col-span-12">
        <p class="text-sm font-medium leading-5 text-gray-500">
            <span class="font-bold">Province: </span>{{ $business[0]->province ?? '' }}
        </p>
    </div>
    <div class="col-span-6 sm:col-span-12 lg:col-span-12">
        <p class="text-sm font-medium leading-5 text-gray-500">
            <span class="font-bold">District:
            </span>{{ $business[0]->municipal_district ?? '' }}
        </p>
    </div>
    <div class="col-span-6 sm:col-span-12 lg:col-span-12">
        <p class="text-sm font-medium leading-5 text-gray-500">
            <span class="font-bold">Municipality:
            </span>{{ $business[0]->municipality ?? '' }}
        </p>
    </div>
    <div class="col-span-6 sm:col-span-12 lg:col-span-12">
        <p class="text-sm font-medium leading-5 text-gray-500">
            <span class="font-bold">Town: </span>{{ $business[0]->town ?? '' }}
        </p>
    </div>
</div>