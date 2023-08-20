

<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="col-span-12 sm:col-span-12">
            <label for="province" class="block text-sm font-medium text-gray-700">Province
                @error('province')
                <p class="text-red-500 text-medium">
                    {{ $message }}
                </p>
                @enderror
            </label>
            <select id="provinceOptions" name="province" autocomplete="province" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                @if ($businessData['provinces'] ?? '')
                @foreach ($businessData['provinces'] as $prov)
                <option value="{{ $prov->id ?? '' }}" @if ($prov->id === $businessData['business']->provinceId) selected @endif>
                    {{ $prov->province }}
                </option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="col-span-12 sm:col-span-12">
            <label for="district" class="block text-sm font-medium text-gray-700">District</label>
            <select id="districtOptions" name="districtId" autocomplete="districtId" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                @if (!empty($businessData['districts']) && !empty($businessData['provinces']))
                @foreach ($businessData['districts'] as $key => $dist)
                @if ($dist->provinceId === $businessData['provinces']->id)
                <option value="{{ $dist->id }}" {{ $dist->id === $businessData['business']->districtId ? 'selected' : '' }}>
                    {{ $dist->municipal_district }}
                </option>
                @endif
                @endforeach
                @endif
            </select>
        </div>

        <div class="col-span-6 sm:col-span-12 lg:col-span-12">
            <label for="municipality" class="block text-sm font-medium text-gray-700">Municipality</label>
            <select id="municipalityOptions" name="municipalityId" autocomplete="municipalityId" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">

                @if ($businessData['municipalities'] ?? '')
                @foreach ($businessData['municipalities'] as $municipality)
                @if ($municipality->districtId === $businessData['business']->districtId)
                <option value="{{ $municipality->id ?? '' }}" @if ($municipality->id === $businessData['business']->municipalityId) selected @endif>

                    {{ $municipality->municipality }}
                </option>
                @endif
                @endforeach
                @endif
            </select>
        </div>
        <div class="col-span-6 sm:col-span-12">
            <label for="town" class="block text-sm font-medium text-gray-700">Town
                @error('town')
                <p class="text-red-500 text-medium">
                    {{ $message }}
                </p>
                @enderror
            </label>
            <input type="text" value="{{ $businessData['business']->town ?? '' }}" name="town" id="town" autocomplete="address-level2" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
    </div>
</div>