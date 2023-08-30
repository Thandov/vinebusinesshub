<h1 class="text-3xl font-bold text-center text-gray-800 mb-12">ENTER YOUR BUSINESS INFORMATION</h1>
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
                <label for="business_number" class="block text-sm font-medium text-gray-700">Business
                    Number
                    @error('business_number')
                    <p class="text-red-500 text-medium">
                        {{ $message }}
                    </p>
                    @enderror
                </label>
                <input type="text" name="business_number" value="{{ $business->business_number ?? '' }}" id="business_number" autocomplete="given-name" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-12 md:col-span-6">
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
            <div class="col-span-12 md:col-span-6">
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
                <label for="about" class="block text-sm font-medium text-gray-700">
                    Tell us more about your business.
                    @error('business_bio')
                    <p class="text-red-500 text-medium">
                        {{ $message }}
                    </p>
                    @enderror
                </label>
                <div class="mt-1">
                    <textarea style="height: 200px" id="business_bio" name="business_bio" onkeyup="charcountupdate(this.value);" rows="3" class="shadow-sm focus:ring-green-500 focus:border-green-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Help Customers Know More About Your Business">{{ $business->business_bio ?? ('' ?? '') }}</textarea>
                    <span class="block text-sm font-medium text-gray-700 mt-3" id=charcount></span>
                </div>
            </div>
            
            <div class="col-span-12 sm:col-span-12">
                <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                <input type="text" value="{{ $business->website ?? '' }}" name="website" id="website" autocomplete="address-level2" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-12 md:col-span-4 ">
                <label for="facebook" class="block text-sm font-medium text-gray-700">Facebook</label>
                <input type="text" value="{{ $business->facebook ?? '' }}" name="facebook" id="facebook" autocomplete="address-level2" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-12 md:col-span-4 ">
                <label for="twitter" class="block text-sm font-medium text-gray-700">Twitter</label>
                <input type="text" value="{{ $business->twitter ?? '' }}" name="twitter" id="twitter" autocomplete="address-level2" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-12 md:col-span-4 ">
                <label for="instagram" class="block text-sm font-medium text-gray-700">Instagram</label>
                <input type="text" value="{{ $business->instagram ?? '' }}" name="instagram" id="instagram" autocomplete="address-level2" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            
        </div>
    </div>
    <!--other form-->
    @include('business.viewbusiness.location')
</div>