<div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <form class="form-group" method="POST" action="{{ route('business.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="pr-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Business Information</h3>
            <p class="mt-1 text-sm text-gray-600">Manage your profile from this
                dashboard.</p>
            <a href="/viewBusiness/{{ $business->id }}" class="mt-1 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">View
                Your Profile
            </a>
            <a onclick="confirmDelete('{{ $business->id }}'); event.preventDefault();" href="deleteBusinessandUser/{{ $business->id }}" class="mt-1 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Delete Profile
            </a>
            <div id="deleteConfirmation" class="hidden">
                <p class="mt-4 text-sm text-gray-600">Are you sure you want to delete your user profile and your business profile?</p>
                <div class="mt-2">
                    <button onclick="cancelDelete()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Cancel</button>
                    <button onclick="approveDelete('{{ $business->id }}')" class="ml-2 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>
                </div>
            </div>
        </div>
        <div class="ss">
            <input type="hidden" name="id" value="{{ $business->id ?? '' }}">
            <div class="overflow-hidden sm:rounded-md mb-5">
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div class="col-span-2 md:col-span-1">
                        <label for="business_name" class="text-base font-semibold leading-7 text-gray-900">Business Name @error('business_name') <p class="text-red-500 text-medium"> {{ $message }}</p> @enderror</label>
                        <input type="text" name="business_name" value="{{ $business->business_name ?? '' }}" id="business_name" autocomplete="given-name" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <label for="business_number" class="text-base font-semibold leading-7 text-gray-900">Business Number @error('business_number') <p class="text-red-500 text-medium"> {{ $message }} </p> @enderror </label> <input type="text" name="business_number" value="{{ $business->business_number ?? '' }}" id="business_number" autocomplete="given-name" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div class="col-span-2 md:col-span-1">
                        <label for="email" class="text-base font-semibold leading-7 text-gray-900">Email address @error('email') <p class="text-red-500 text-medium"> {{ $message }} </p> @enderror </label> <input type="text" value="{{ $business->email ?? '' }}" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <label for="company_reg" class="text-base font-semibold leading-7 text-gray-900">Company Registration Number @error('company_reg') <p class="text-red-500 text-medium">{{ $message }}</p> @enderror </label> <input type="text" value="{{ $business->company_reg ?? '' }}" name="company_reg" id="company_reg" autocomplete="address" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="about" class="text-base font-semibold leading-7 text-gray-900"> Tell us more about your business. @error('business_bio') <p class="text-red-500 text-medium"> {{ $message }} </p> @enderror </label>
                        <div class="mt-1">
                            <textarea style="height: 200px" id="business_bio" name="business_bio" onkeyup="charcountupdate(this.value);" rows="3" class="shadow-sm focus:ring-green-500 focus:border-green-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Help Customers Know More About Your Business">{{ $business->business_bio ?? ('' ?? '') }}</textarea>
                            <span class="text-base font-semibold leading-7 text-gray-900 mt-3" id=charcount></span>
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <div class="col-span-12 md:col-span-4 ">
                            <label for="facebook" class="text-base font-semibold leading-7 text-gray-900">Facebook</label>
                            <input type="text" value="{{ $business->facebook ?? '' }}" name="facebook" id="facebook" autocomplete="address-level2" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-12 md:col-span-4 ">
                            <label for="twitter" class="text-base font-semibold leading-7 text-gray-900">Twitter</label>
                            <input type="text" value="{{ $business->twitter ?? '' }}" name="twitter" id="twitter" autocomplete="address-level2" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-12 md:col-span-4 ">
                            <label for="instagram" class="text-base font-semibold leading-7 text-gray-900">Instagram</label>
                            <input type="text" value="{{ $business->instagram ?? '' }}" name="instagram" id="instagram" autocomplete="address-level2" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--other form-->

        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 mt-4">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Save
            </button>
        </div>
    </form>
</div>