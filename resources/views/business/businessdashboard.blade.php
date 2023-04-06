<x-app-layout title="Business Dashbard">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Business Dashboard') }}
        </h2>
    </x-slot>

    <div class="container py-12">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col">
                        <div>
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 active"
                                        id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                                        type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Business</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                        id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                                        type="button" role="tab" aria-controls="pills-profile"
                                        aria-selected="false">Company Rep</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                        id="pills-services-tab" data-bs-toggle="pill" data-bs-target="#pills-services"
                                        type="button" role="tab" aria-controls="pills-services"
                                        aria-selected="false">Services</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div>
                                        <div class="md:grid md:grid-cols-3 md:gap-6">
                                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                                <div class="md:col-span-6">
                                                    <div class="pr-4 sm:px-0">
                                                        <h3 class="text-lg font-medium leading-6 text-gray-900">Business
                                                            Information
                                                        </h3>
                                                        <p class="mt-1 text-sm text-gray-600">
                                                            Manage your profile from this dashboard.
                                                        </p>
                                                        <a href="/viewBusiness/{{ $business[0]->id }}"
                                                            class="mt-1 text-sm text-gray-600 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">View
                                                            Your Profile
                                                        </a>
                                                        <a onclick="deleteBusinessandUser({{$business[0]->id}});"
                                                            href="deleteBusinessandUser/{{$business[0]->id}}"
                                                            class="mt-1 text-sm text-gray-600 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete
                                                            Profile
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="md:mt-0 md:col-span-2">
                                                <form class="form-group" method="POST"
                                                    action="{{ route('business.update') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$business[0]->id ?? ''}}">
                                                    <div class="shadow overflow-hidden sm:rounded-md mb-5">
                                                        <div class="px-4 py-5 bg-white sm:p-6">
                                                            <div class="grid grid-cols-12 gap-6">
                                                                <div class="col-span-12 md:col-span-6">
                                                                    <label for="business_name"
                                                                        class="block text-sm font-medium text-gray-700">Business
                                                                        Name
                                                                        @error('business_name')
                                                                        <p class="text-red-500 text-medium">
                                                                            {{ $message }}</p>
                                                                        @enderror
                                                                    </label>
                                                                    <input type="text" name="business_name"
                                                                        value="{{ $business[0]->business_name ?? '' }}"
                                                                        id="business_name" autocomplete="given-name"
                                                                        class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                                
                                                                    </div>
                                                                <div class="col-span-12 md:col-span-6">
                                                                    <label for="business_number"
                                                                        class="block text-sm font-medium text-gray-700">Business
                                                                        Number
                                                                    </label>
                                                                    <input type="text" name="business_number"
                                                                        value="{{ $business[0]->business_number ?? '' }}"
                                                                        id="business_number" autocomplete="given-name"
                                                                        class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                </div>
                                                                <div class="col-span-12 sm:col-span-12">
                                                                    <label for="email"
                                                                        class="block text-sm font-medium text-gray-700">Email
                                                                        address
                                                                    </label>
                                                                    <input type="text"
                                                                        value="{{ $business[0]->email ?? '' }}"
                                                                        name="email" id="email" autocomplete="email"
                                                                        class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                </div>
                                                                <div class="col-span-12 sm:col-span-12">
                                                                    <label for="about"
                                                                        class="block text-sm font-medium text-gray-700">
                                                                        Tell us more about your business.
                                                                        @error('business_bio')
                                                                        <p class="text-red-500 text-medium">
                                                                            {{ $message }}</p>
                                                                        @enderror
                                                                    </label>
                                                                    <div class="mt-1">
                                                                        <textarea style="height: 200px"
                                                                            id="business_bio" name="business_bio"
                                                                            onkeyup="charcountupdate(this.value);"
                                                                            rows="3"
                                                                            class="shadow-sm focus:ring-green-500 focus:border-green-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                                                            placeholder="Aboout Your Business">{{ $business[0]->business_bio ?? '' ?? ''}}</textarea>
                                                                        <span
                                                                            class="block text-sm font-medium text-gray-700 mt-3"
                                                                            id=charcount></span>
                                                                    </div>
                                                                </div>

                                                                <div class="col-span-12 md:col-span-12 ">
                                                                    <label for="company_reg"
                                                                        class="block text-sm font-medium text-gray-700">Company
                                                                        Registration Number</label>
                                                                    <input type="text"
                                                                        value="{{ $business[0]->company_reg ?? '' }}"
                                                                        name="company_reg" id="company_reg"
                                                                        autocomplete="address"
                                                                        class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                </div>


                                                                <div class="col-span-12 sm:col-span-12">
                                                                    <label for="industry"
                                                                        class="block text-sm font-medium text-gray-700">Industry</label>
                                                                    <select id="industryId" name="industryId"
                                                                        autocomplete="industry"
                                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                                                        @if($industries ?? '' ) @foreach($industries as
                                                                        $industry)
                                                                        <option value="{{ $industry->id ?? '' }}"
                                                                            @if($industry->id ===
                                                                            $business[0]->industryId) selected @endif
                                                                            > {{ $industry->industry }}
                                                                        </option>
                                                                        @endforeach @endif
                                                                        <option id="otherOption" value="other">Other
                                                                        </option>
                                                                    </select>

                                                                </div>

                                                                <div class="col-span-12 sm:col-span-12">
                                                                    <label for="website"
                                                                        class="block text-sm font-medium text-gray-700">Website</label>
                                                                    <input type="text"
                                                                        value="{{ $business[0]->website ?? '' }}"
                                                                        name="website" id="website"
                                                                        autocomplete="address-level2"
                                                                        class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                </div>
                                                                <div class="col-span-12 md:col-span-4 ">
                                                                    <label for="facebook"
                                                                        class="block text-sm font-medium text-gray-700">Facebook</label>
                                                                    <input type="text"
                                                                        value="{{ $business[0]->facebook ?? '' }}"
                                                                        name="facebook" id="facebook"
                                                                        autocomplete="address-level2"
                                                                        class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                </div>
                                                                <div class="col-span-12 md:col-span-4 ">
                                                                    <label for="twitter"
                                                                        class="block text-sm font-medium text-gray-700">Twitter</label>
                                                                    <input type="text"
                                                                        value="{{ $business[0]->twitter ?? '' }}"
                                                                        name="twitter" id="twitter"
                                                                        autocomplete="address-level2"
                                                                        class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                </div>
                                                                <div class="col-span-12 md:col-span-4 ">
                                                                    <label for="instagram"
                                                                        class="block text-sm font-medium text-gray-700">Instagram</label>
                                                                    <input type="text"
                                                                        value="{{ $business[0]->instagram ?? '' }}"
                                                                        name="instagram" id="instagram"
                                                                        autocomplete="address-level2"
                                                                        class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                </div>
                                                                <div class="col-span-12">
                                                                    <label
                                                                        class="block text-sm font-medium text-gray-700">
                                                                        Logo
                                                                    </label>
                                                                    <div
                                                                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                                                        <img id="logo-preview" src="#" style="display: none; width: 250px" alt="">
                                                                        <div class="space-y-1 text-center"
                                                                            id="logouploader"
                                                                            @if(!is_null($business[0]->logo))
                                                                            style="display: none" @endif>
                                                                            <div>
                                                                                <svg class="mx-auto h-12 w-12 text-gray-400"
                                                                                    stroke="currentColor" fill="none"
                                                                                    viewBox="0 0 48 48"
                                                                                    aria-hidden="true">
                                                                                    <path
                                                                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>
                                                                                <div class="text-sm text-gray-600">
                                                                                    <label for="file-upload"
                                                                                        class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                                                                        <span>Upload a file</span>
                                                                                        <input id="file-upload"
                                                                                            value="{{$business[0]->logo}}"
                                                                                            name="file-upload"
                                                                                            type="file" class="sr-only">

                                                                                    </label>
                                                                                    <p class="pl-1">or drag and drop</p>
                                                                                </div>
                                                                                <p class="text-xs text-gray-500">
                                                                                    PNG, JPG, GIF up to 10MB
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        @if(!empty($business[0]->logo) )
                                                                        <img style="width: 250px"
                                                                            src="/img/{{$business[0]->logo}}"
                                                                            alt="{{ $business[0]->logo }}" srcset="">
                                                                        @endif
                                                                    </div>
                                                                    <div class="mt-1 flex items-center">
                                                                        <button type="button"
                                                                            class="changeLogoBtn bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                                            Change
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="shadow overflow-hidden sm:rounded-md">
                                                        <div class="px-4 py-5 bg-white sm:p-6">
                                                            <div class="grid grid-cols-12 gap-6">

                                                                <div class="col-span-12 md:col-span-12">
                                                                    <label for="address"
                                                                        class="block text-sm font-medium text-gray-700">Street
                                                                        address </label>
                                                                    <input type="text"
                                                                        value="{{ $business[0]->address ?? '' }}"
                                                                        name="address" id="address"
                                                                        autocomplete="address"
                                                                        class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                </div>
                                                                <div class="col-span-12 sm:col-span-12">
                                                                    <label for="province"
                                                                        class="block text-sm font-medium text-gray-700">Province</label>
                                                                    <select id="provinceOptions" name="province"
                                                                        autocomplete="province"
                                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                                                        @if($provinces ?? '' )
                                                                        @foreach($provinces as $prov)
                                                                        <option value="{{ $prov->id ?? '' }}"
                                                                            @if($prov->id === $business[0]->provinceId)
                                                                            selected @endif>
                                                                            {{ $prov->province }}
                                                                        </option>
                                                                        @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                <div class="col-span-12 sm:col-span-12">
                                                                    <label for="district"
                                                                        class="block text-sm font-medium text-gray-700">District</label>
                                                                    <select id="districtOptions" name="districtId"
                                                                        autocomplete="districtId"
                                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                                                        @if($districts ?? '' )
                                                                        @foreach($districts as $dist)
                                                                        @if($dist->provinceId ===
                                                                        $business[0]->provinceId )
                                                                        <option value="{{ $dist->id ?? '' }}"
                                                                            @if($dist->id === $business[0]->districtId)
                                                                            selected @endif>
                                                                            {{ $dist->municipal_district }}
                                                                        </option>
                                                                        @endif
                                                                        @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                <div class="col-span-6 sm:col-span-12 lg:col-span-12">
                                                                    <label for="municipality"
                                                                        class="block text-sm font-medium text-gray-700">Municipality</label>
                                                                    <select id="municipalityOptions"
                                                                        name="municipalityId"
                                                                        autocomplete="municipalityId"
                                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">

                                                                        @if($municipalities ?? '' )
                                                                        @foreach($municipalities as $municipality)
                                                                        @if($municipality->districtId ===
                                                                        $business[0]->districtId )
                                                                        <option value="{{ $municipality->id ?? '' }}"
                                                                          
                                                                            @if($municipality->id ===
                                                                            $business[0]->municipalityId) selected
                                                                             @endif>
                                                                         
                                                                            {{ $municipality->municipality }} 
                                                                        </option>
                                                                        @endif
                                                                        @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                <div class="col-span-6 sm:col-span-12">
                                                                    <label for="town"
                                                                        class="block text-sm font-medium text-gray-700">Town</label>
                                                                    <input type="text"
                                                                        value="{{ $business[0]->town ?? '' }}"
                                                                        name="town" id="town"
                                                                        autocomplete="address-level2"
                                                                        class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div>
                                        <div class="md:grid md:grid-cols-3 md:gap-6">
                                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                                <div class="md:col-span-6">
                                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Company
                                                        Representative
                                                    </h3>
                                                    <p class="mt-1 text-sm text-gray-600">Manage your company
                                                        representative
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="md:mt-0 md:col-span-2">
                                                <form action="#" method="POST">
                                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                                            <div class="grid grid-cols-6 gap-6">
                                                                <div class="col-span-3 sm:col-span-3">
                                                                    <label for="company-website"
                                                                        class="font-bold block text-sm font-medium text-gray-700">
                                                                        Company Representative
                                                                    </label>
                                                                    <div class="mt-1 flex rounded-md shadow-sm">

                                                                        <input type="text"
                                                                            value="{{ $rep[0]->name ?? '' }}"
                                                                            name="company-website" id="company-website"
                                                                            class="focus:ring-green-500 focus:border-green-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                                    </div>
                                                                </div>
                                                                <div class="col-span-3 sm:col-span-3">
                                                                    <label for="company-website"
                                                                        class="font-bold block text-sm font-medium text-gray-700">
                                                                        Email Address
                                                                    </label>
                                                                    <div id="servicesList">
                                                                        <div class="mt-1 flex rounded-md shadow-sm">

                                                                            <input type="text"
                                                                                value="{{ $rep[0]->email ?? '' }}"
                                                                                name="company-website"
                                                                                id="company-website"
                                                                                class="focus:ring-green-500 focus:border-green-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                                                placeholder="www.example.com">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="grid grid-cols-3 gap-6">
                                                                <div class="col-span-3 sm:col-span-3">
                                                                    <p class="block text-sm font-medium text-gray-700">
                                                                        <span class="font-bold">Created:
                                                                        </span>{{ $rep[0]->created_at ?? '' }}
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <div class="grid grid-cols-6 gap-6">
                                                                <div class="col-span-3 sm:col-span-3">
                                                                    <label for="company-website"
                                                                        class="font-bold block text-sm font-medium text-gray-700">
                                                                        Activation Status
                                                                    </label>
                                                                    <p class="text-sm text-gray-600">An annual
                                                                        subscription fee of R400 is required to complete
                                                                        your business verification
                                                                    </p>

                                                                    <div id="activationwrap"
                                                                        class="mt-2 d-flex align-items-center justify-content-start">

                                                                        <br>
                                                                        <a href="/send-email/{{ $business[0]->email}}"
                                                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2 @if($business[0]->activation_status == 0) focus:ring-yellow-500 bg-yellow-600 hover:bg-yellow-700 @else focus:ring-green-500 bg-green-600 hover:bg-green-700 @endif"
                                                                            id="activationbox">
                                                                            @if($business[0]->activation_status == 0)
                                                                            Not Activated @else Activated @endif</a>
                                                                    </div>


                                                                </div>
                                                                <div class="col-span-3 sm:col-span-3">
                                                                    <label for="company-website"
                                                                        class="font-bold block text-sm font-medium text-gray-700">
                                                                        Verification Status
                                                                    </label>

                                                                    <div id="verificationwrap"
                                                                        class="mt-2 d-flex align-items-center justify-content-start">
                                                                        @if($business[0]->email_verified_at == 0)
                                                                        <a href=""
                                                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-yellow-500 bg-yellow-600 hover:bg-yellow-700 ">Resend
                                                                            verification Email</a>
                                                                        @else
                                                                        <div
                                                                            class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                                            Activated
                                                                        </div>
                                                                        @endif

                                                                    </div>
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
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-services" role="tabpanel"
                                    aria-labelledby="pills-services-tab">
                                    <div>
                                        <div class="md:grid md:grid-cols-3 md:gap-6">
                                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                                <div class="md:col-span-6">
                                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Services
                                                    </h3>
                                                    <p class="mt-1 text-sm text-gray-600">Decide which communications
                                                        you'd like to receive and how </p>
                                                </div>
                                            </div>
                                            <div class="md:mt-0 md:col-span-2">
                                                <div class="md:mt-0 md:col-span-8 md:col-start-3">
                                                    @foreach($industries as $key => $industry) @if($industries[$key]->id
                                                    == $business[0]->industryId)
                                                    <form class="ajax"
                                                        action="/business/businessdashboard/insertclientservice"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" name="bid" value="{{$business[0]->id}}">
                                                        <input type="hidden" name="industryId"
                                                            value="{{$industries[$key]->id}}">
                                                        <div class="shadow overflow-hidden sm:rounded-md">
                                                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                                                <fieldset class="md:grid md:grid-cols-12 md:gap-6">
                                                                    <legend
                                                                        class="md:col-span-12 text-base font-medium text-gray-900">
                                                                        <h3>{{ $industry->industry }}</h3>
                                                                    </legend>
                                                                    @if($services ?? '') @php $i = 0; $x = 0; @endphp
                                                                    @for($i=0; $i
                                                                    < count($services); $i++) @if( $services[$i]->
                                                                        industryId === $industries[$key]->id)
                                                                        <div class="mt-1 space-y-4 md:col-span-12">
                                                                            <div class="flex items-start">
                                                                                <div class="flex items-center h-5">
                                                                                    <input name="serviceId[]"
                                                                                        value="{{$services[$i]->id}}"
                                                                                        type="checkbox"
                                                                                        class="mr-3 focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300 rounded"
                                                                                        @for($x=0; $x <
                                                                                        count($clientsservices); $x++)
                                                                                        @if($services[$i]->id ===
                                                                                    $clientsservices[$x]->serviceId)
                                                                                    @php echo "checked"; @endphp @endif
                                                                                    @endfor
                                                                                    >
                                                                                    <label for="comments"
                                                                                        class="font-medium text-gray-700">@php
                                                                                        echo
                                                                                        $services[$i]->service_name;
                                                                                        @endphp
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endif @endfor @endif
                                                                </fieldset>
                                                            </div>
                                                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                                                <button type="submit"
                                                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                                    Save
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    @endif @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="newIndustry" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="newIndustryLabel" aria-hidden="true">
        <form class="form-group" data-target="insertIndustry" id="insertIndustry" action="{{ route('business.businessdashboard.insertIndustry') }}" method="post">
            @csrf
            <input type="hidden"name="approval_type" value="new_industry">
            <input type="hidden"name="who_id" value="{{ auth()->user()->id }} ">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newIndustryLabel">Enter New Industry</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="the_content"
                            class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="newbtn" type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
<script>
    function readURL(input) {
   if (input.files && input.files[0]) {
     var reader = new FileReader();
     reader.onload = function(e) {
       $('#logo-preview').attr('src', e.target.result);
     }
     reader.readAsDataURL(input.files[0]);
     $('#logo-preview').show();
   }
 }
 
 $("input[type='file']").change(function() {
   readURL(this);
 });
    
jQuery(document).ready(function() {
    var selectedprovinceId = $(this).find(":selected").val();

    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        jQuery(document).on('change', '#industryId', function(e) {
            e.preventDefault();

            var otherOption = $(this).find(":selected").val();
            if (otherOption === "other") {
                $('#newIndustry').modal('show');
            }
        });

        /*
        jQuery(document).on('click', '#newbtn', function(e) {
            e.preventDefault();
            var serviceArray = new Array(),
                id, target, refreshTarget;


            jQuery.map($("input[name='service_name[]']"), function(obj, index) {
                if ($(obj).val()) {
                    serviceArray.push($(obj).val());
                }
            });
            id = $(this).find('.serviceId').val();

            jQuery.ajax({
                url: "/business/businessdashboard/insertIndustry",
                type: 'post',
                data: {
                    'service_name': serviceArray,
                    'id': id
                },
                dataType: 'JSON',
                success: function(response) {
                    console.log(response);

                },
                error: function(jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status === 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status === 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'function Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                }
            });
        }); 
        */
    jQuery(document).on('click', '.changeLogoBtn', function(e) {
        e.preventDefault();
        $("#logouploader").css("display", "block");
    });
    jQuery(document).on('change', '#provinceOptions', function() {
        var query = jQuery(this).val(),
            searchOption = "provinceSearch",
            viewType = "cardView";
        var provinceId = $(this).find(":selected").val();
        changeDistrict(provinceId);
    });
    jQuery(document).on('change', '#districtOptions', function() {
        var query = jQuery(this).val(),
            searchOption = "industrySearch",
            viewType = "cardView";
        var provinceId = $(this).find(":selected").val();
        changeMunicipality(provinceId);
    });
    
});

function deleteBusinessandUser(id) {
    confirm("This will delete your user profile and your business profile <br><br> Would you like to continue?");
}

function changeDistrict($id) {
    jQuery.ajax({
        url: "{{ route('home.changeDistrict') }}",
        menthod: 'GET',
        data: {
            id: $id
        },
        dataType: 'json',
        success: function(data) {
            console.log(data);

            jQuery('#districtOptions')
                .find('option')
                .remove()
                .end();
            data.forEach(district => {
                console.log(district);
                console.log(district.municipal_district);
                console.log(district.id);
                jQuery('#districtOptions')
                    .append('<option onclick=" changeMunicipality(' + district.id +
                        ');" value="' +
                        district.id + '">' + district.municipal_district +
                        '</option>');
            });
            $("#districtOptions").val($("#districtOptions option:first").val());
            var selectedDistrict = $("#districtOptions").find(":selected").val();
            changeMunicipality(selectedDistrict);
        }
    });
}

function charcountupdate(str) {
    var lng = str.length;
    document.getElementById("charcount").innerHTML = '<span id="countNumber" class="text-green-700">' + lng +
        '</span>' + ' out of 1000 characters';
}

function changeMunicipality($id) {
    jQuery.ajax({
        url: "{{ route('home.changeMunicipality') }}",
        menthod: 'GET',
        data: {
            id: $id
        },
        dataType: 'json',
        success: function(data) {
            jQuery('#municipalityOptions')
                .find('option')
                .remove()
                .end();
            data.forEach(municipality => {
                console.log(municipality);
                console.log(municipality.municipality);
                console.log(municipality.id);
                jQuery('#municipalityOptions')
                    .append('<option value="' + municipality.id + '">' + municipality.municipality +
                        '</option>');
            });
            $("#municipalityOptions").val($("#municipalityOptions option:first").val());
        }
    });



}
</script>