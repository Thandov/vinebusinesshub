<h1 class="text-3xl font-bold text-center text-gray-800 mb-12">INDUSTRY AND SERVICES</h1>
<div class="grid grid-cols-2 gap-6">
    <div class="md:col-span-1 col-span-2">
        <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
        <select id="industryId" name="industryId" autocomplete="industry" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
            @if ($industries ?? '')
            @php
            $sortedIndustries = $industries->sortByDesc('id');
            @endphp
            @foreach ($sortedIndustries as $industry)
            <option value="{{ $industry->id ?? '' }}" {{ $industry->id === $business->industryId ? 'selected' : '' }}>
                {{ $industry->industry }}
            </option>
            @endforeach
            @endif
        </select>
    </div>
</div>