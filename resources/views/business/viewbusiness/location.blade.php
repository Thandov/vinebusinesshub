<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-12 gap-6">

            <div class="col-span-12 md:col-span-12">
                <label for="address" class="block text-sm font-medium text-gray-700">Street
                    address
                    @error('address')
                        <p class="text-red-500 text-medium">
                            {{ $message }}
                        </p>
                    @enderror
                </label>
                <input type="text" value="{{ $business->address ?? '' }}" name="address" id="address"
                    autocomplete="address"
                    class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-12 sm:col-span-12">
                <label for="province" class="block text-sm font-medium text-gray-700">Province
                    @error('province')
                        <p class="text-red-500 text-medium">
                            {{ $message }}
                        </p>
                    @enderror
                </label>
                <select id="provinceOptions" name="province" autocomplete="province"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    @if ($provinces ?? '')
                        @foreach ($provinces as $prov)
                            <option value="{{ $prov->id ?? '' }}" @if ($prov->id === $business->provinceId) selected @endif>
                                {{ $prov->province }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-span-12 sm:col-span-12">
                <label for="district" class="block text-sm font-medium text-gray-700">District</label>
                <select id="districtOptions" name="districtId" autocomplete="districtId"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    @if ($districts ?? '')
                        @foreach ($districts as $dist)
                            @if ($dist->provinceId === $business->provinceId)
                                <option value="{{ $dist->id ?? '' }}" @if ($dist->id === $business->districtId) selected @endif>
                                    {{ $dist->municipal_district }}
                                </option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-span-6 sm:col-span-12 lg:col-span-12">
                <label for="municipality" class="block text-sm font-medium text-gray-700">Municipality</label>
                <select id="municipalityOptions" name="municipalityId" autocomplete="municipalityId"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">

                    @if ($municipalities ?? '')
                        @foreach ($municipalities as $municipality)
                            @if ($municipality->districtId === $business->districtId)
                                <option value="{{ $municipality->id ?? '' }}"
                                    @if ($municipality->id === $business->municipalityId) selected @endif>

                                    {{ $municipality->municipality }}
                                </option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-span-12 sm:col-span-12">
                <label for="town" class="block text-sm font-medium text-gray-700">Town</label>
                <select id="townOptions" name="townId" autocomplete="townId"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    @if ($towns ?? '')
                        @foreach ($towns as $town)
                            @if ($town->provinceId === $business->provinceId)
                                <option value="{{ $town->id ?? '' }}"
                                    @if ($town->id === $business->townId) selected @endif>
                                    {{ $town->town }}
                                </option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>

        </div>
    </div>
    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <button type="submit"
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
            Save
        </button>
    </div>
</div>
