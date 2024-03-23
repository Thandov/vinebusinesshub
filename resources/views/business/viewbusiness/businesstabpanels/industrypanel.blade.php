<?php 
echo '<pre>';
echo '</pre>';
 
?>
<div class="tab-pane fade" id="pills-services" role="tabpanel" aria-labelledby="pills-services-tab">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-12">INDUSTRY AND SERVICES</h1>
    <div class="grid grid-cols-2 gap-6">
        <div class="md:col-span-1 col-span-2">
            <label for="industry" class="text-base font-semibold leading-7 text-gray-900">Industry</label>
            <select id="industryId" name="industryId" autocomplete="industry" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                @if($industries ?? '')
                    @foreach($industries->sortBy('industry') as $industry)
                        <option value="{{ $industry->id ?? '' }}" @if(isset($clientsindustry) !=null) @if ($industry->id == $clientsindustry ) selected @else ''; @endif @endif >
                            {{ $industry->industry }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col-span-1">
            <div class="md:mt-0 md:col-span-8 md:col-start-3">
                <input type="hidden" name="regindustryId" id="regindustryId" value="">
                <input type="hidden" name="selectedServices" id="selectedServices" value="{{ $businessData['clientsservices'] ?? '' }}">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <legend class="md:col-span-12 text-base font-medium text-gray-900">
                            <h3 class="text-base font-semibold leading-7 text-gray-900" id="industryTitle">Services</h3>
                        </legend>
                        <div id="servicesreg"></div>
                    </div>
                </div>
                <div class="md:mt-8 md:col-span-2 grid grid-cols-3 gap-6">
                </div>
            </div>
        </div>
    </div>
</div>