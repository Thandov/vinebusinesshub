<input type="hidden" name="id" value="{{ $business->id ?? '' }}">
<div class="shadow overflow-hidden sm:rounded-md mb-5">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 md:col-span-6">
                <label for="business_name" class="block text-sm font-medium text-gray-700">Business
                    Name
                    @error('business_name')
                    <p class="text-red-500 text-medium">
                        {{ $message }}
                    </p>
                    @enderror
                </label>
                <input type="text" name="business_name" value="{{ $business->business_name ?? '' }}" id="business_name" autocomplete="given-name" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

            </div>
            <div class="col-span-12 md:col-span-6">
                <label for="business_number" class="block text-sm font-medium text-gray-700">Phone Number
                    @error('business_number')
                    <p class="text-red-500 text-medium">
                        {{ $message }}
                    </p>
                    @enderror
                </label>
                <input type="text" name="business_number" value="{{ $business->business_number ?? '' }}" id="business_number" autocomplete="given-name" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-12 sm:col-span-12">
                <label for="email" class="block text-sm font-medium text-gray-700">Email
                    address
                    @error('email')
                    <p class="text-red-500 text-medium">
                        {{ $message }}
                    </p>
                    @enderror
                </label>
                <input type="text" value="{{ $business->email ?? '' }}" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-12 sm:col-span-12">
                <label for="about" class="block text-sm font-medium text-gray-700">
                    Tell us more about your business.
                    @error('business_bio')
                    <p class="text-red-500 text-medium">
                        {{ $message }}
                    </p>
                    @enderror
                </label>
                <div class="mt-1">
                    <textarea style="height: 200px" id="business_bio" name="business_bio" onkeyup="charcountupdate(this.value);" rows="3" class="shadow-sm focus:ring-green-500 focus:border-green-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Aboout Your Business">{{ $business->business_bio ?? ('' ?? '') }}</textarea>
                    <span class="block text-sm font-medium text-gray-700 mt-3" id=charcount></span>
                </div>
            </div>
            <div class="col-span-12 md:col-span-12 ">
                <label for="company_reg" class="block text-sm font-medium text-gray-700">Company
                    Registration Number
                    @error('company_reg')
                    <p class="text-red-500 text-medium">
                        {{ $message }}
                    </p>
                    @enderror
                </label>
                <input type="text" value="{{ $business->company_reg ?? '' }}" name="company_reg" id="company_reg" autocomplete="address" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-12 sm:col-span-12">
                <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
                <select id="industryId" name="industryId" autocomplete="industry" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    @if ($businessData['industries'] ?? '')
                    @php

                    $sortedIndustries = $businessData['industries']->sortByDesc('id');
                    @endphp
                    @foreach ($sortedIndustries as $industry)
                    <option value="{{ $industry->id ?? '' }}" {{ $industry->id === $businessData['business']->industryId ? 'selected' : '' }}>
                        {{ $industry->industry }}
                    </option>
                    @endforeach
                    @endif
                </select>
            </div>

            <div class="col-span-12">
                <label for="logo" class="block text-sm font-medium text-gray-700">
                    Logo
                    @error('logo')
                    <p class="text-red-500 text-medium">
                        {{ str_replace('logo field', 'logo', $message) }}
                    </p>
                    @enderror
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <x-img-upload image="{{ $post->icon ?? '' }}" classing="bigTall" />
                    @if (!empty($business->logo))
                    <img style="width: 250px" src="/img/{{ $business->logo }}" alt="{{ $business->logo }}" srcset="">
                    @endif
                </div>
                <div class="mt-1 flex items-center">
                    <button id="change-logo-btn" type="button" class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Change
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>