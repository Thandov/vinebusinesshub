<form id="searchForm">
    <div class="container bg-white shadow-sm py-12 rounded-md">
        <div class="row">
            <div class="col-12">
                <h4 class="pb-2 font-bold">Search criteria:</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label for="business_name" class="block text-sm font-medium text-gray-700">Business Name
                </label>
                <input type="text" placeholder="Enter your Search" name="search" class="shadow-sm appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="liveSearch">
            </div>
            <div class="col-12">
                <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                <select id="provinceOptions" class="shadow-sm appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                    {{ $provinces ?? '' }} @if($provinces ?? '' ) @foreach($provinces ?? '' as $province)
                    <option value="{{ $province->id }}" data-name="{{ $province->province }}">
                        {{ $province->province }}
                    </option>
                    @endforeach @endif
                </select>
            </div>
            <div class="col-12">
                <label for="district" class="block text-sm font-medium text-gray-700">District</label>
                <select id="districtOptions" class="shadow-sm appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">

                </select>
            </div>
            <div class="col-12">
                <label for="municipality" class="block text-sm font-medium text-gray-700">Municipality</label>
                <select id="municipalityOptions" class="shadow-sm appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                    {{ $municipalities ?? '' }} @if($municipalities ?? '' ) @foreach($municipalities ?? ''
                    as $municipality)
                    <option>{{ $municipality->municipality }}</option>
                    @endforeach @endif
                </select>
            </div>
            <!--  <div class="col-12">
                            <label for="town" class="block text-sm font-medium text-gray-700">Town</label>
                            <select id="townOptions"
                                class="shadow-sm appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"></select>
                        </div> -->
            <div class="col-12">
                <label for="Industry" class="block text-sm font-medium text-gray-700">Industry</label>
                <select id="industryOptions" class="shadow-sm appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">

                    @if($industry ?? '' ) @foreach($industry as $indust)
                    <option value="{{ $indust->industry }}">{{ $indust->industry }}</option>
                    @endforeach @endif
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Submit</button>
            </div>
        </div>
    </div>
</form>