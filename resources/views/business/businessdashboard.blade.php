<x-app-layout title="Business Dashbard">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Business Dashboard') }}
        </h2>
    </x-slot>
    <div class="md:grid md:grid-cols-1 h-full bg-green-400" id="dashboard_view">
        <!--  <div class="sidebar h-full bg-red-50">
            <div class="justify-between h-full">
                <div class="p-4">
                    <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-gray-900">
                        <svg class="w-[19px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8v10a1 1 0 0 0 1 1h4v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5h4a1 1 0 0 0 1-1V8M1 10l9-9 9 9" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </div>
                <div class="p-4">
                    <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-gray-900">
                        <svg class="w-[19px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                        </svg>
                        <span>Profile</span>
                    </a>
                </div>
                <div class="p-4">
                    <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-gray-900">
                        <svg class="w-[19px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1v14h16m0-9-3-2-3 5-3-2-3 4" />
                        </svg>
                        <span>Analytics</span>
                    </a>
                </div>
                <div class="p-4">
                    <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-gray-900">
                        <svg class="w-[19px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>
                        <span>Financials</span>
                    </a>
                </div>
                <div class="p-4">
                    <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-gray-900">
                        <svg class="w-[19px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 2-8.4 7.05a1 1 0 0 1-1.2 0L1 2m18 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1m18 0v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2" />
                        </svg>
                        <span>Messages</span>
                    </a>
                </div>
                <div class="p-4">
                    <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-gray-900">
                        <svg class="w-[19px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path
                                    d="M19 11V9a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L12 2.757V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L2.929 4.343a1 1 0 0 0 0 1.414l.536.536L2.757 8H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535L8 17.243V18a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H18a1 1 0 0 0 1-1Z" />
                                <path d="M10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </g>
                        </svg>
                        <span>Management</span>
                    </a>
                </div>
            </div>
        </div> -->
        <div class="contentwrapper h-full col-span-3">
            <!-- Power Tools -->
            <div class="max-w-7xl mx-auto mb-4 sm:px-6 lg:px-8 py-3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-start mb-4">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <i class="fas fa-cogs text-white"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Power Tools</h3>
                                    </dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">All the digital power in
                                                your hands</p>
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                            <div class="ml-auto">
                            </div>
                        </div>
                        <x-powerups-blocks />
                    </div>
                </div>
            </div>
            <!-- Profile -->
            <div class="max-w-7xl mx-auto mb-4 sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-start mb-4">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <i class="fas fa-cogs text-white"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Profile</h3>
                                    </dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Profiling Your Business</p>
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                            <div class="ml-auto">
                            </div>
                        </div>
                        <div class="grid sm:grid-flow-row gap-4">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">
                                        <!-- Manage Business -->
                                        <div
                                            class="bg-white shadow-md flex flex-col items-center text-center justify-center rounded-lg hover:bg-green-500 hover:text-green-500 p-4">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 21 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M6.487 1.746c0 4.192 3.592 1.66 4.592 5.754 0 .828 1 1.5 2 1.5s2-.672 2-1.5a1.5 1.5 0 0 1 1.5-1.5h1.5m-16.02.471c4.02 2.248 1.776 4.216 4.878 5.645C10.18 13.61 9 19 9 19m9.366-6h-2.287a3 3 0 0 0-3 3v2m6-8a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <p class="mt-2 text-sm">Manage Business</p>
                                        </div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">
                                        <!-- Business Representatives -->
                                        <div
                                            class="bg-white shadow-md flex flex-col items-center text-center justify-center rounded-lg hover:bg-green-500 hover:text-green-500 p-4">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 21 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M6.487 1.746c0 4.192 3.592 1.66 4.592 5.754 0 .828 1 1.5 2 1.5s2-.672 2-1.5a1.5 1.5 0 0 1 1.5-1.5h1.5m-16.02.471c4.02 2.248 1.776 4.216 4.878 5.645C10.18 13.61 9 19 9 19m9.366-6h-2.287a3 3 0 0 0-3 3v2m6-8a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <p class="mt-2 text-sm">Business Representatives</p>
                                        </div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button id="pills-services-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-services" type="button" role="tab"
                                        aria-controls="pills-services" aria-selected="false">
                                        <!-- Our Services -->
                                        <div
                                            class="bg-white shadow-md flex flex-col items-center text-center justify-center rounded-lg hover:bg-green-500 hover:text-green-500 p-4">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 21 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M6.487 1.746c0 4.192 3.592 1.66 4.592 5.754 0 .828 1 1.5 2 1.5s2-.672 2-1.5a1.5 1.5 0 0 1 1.5-1.5h1.5m-16.02.471c4.02 2.248 1.776 4.216 4.878 5.645C10.18 13.61 9 19 9 19m9.366-6h-2.287a3 3 0 0 0-3 3v2m6-8a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <p class="mt-2 text-sm">Our Services</p>
                                        </div>
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="md:grid md:grid-row md:gap-4">
                                        <div class="pr-4 sm:px-0">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">Business
                                                Information</h3>
                                            <p class="mt-1 text-sm text-gray-600">Manage your profile from this
                                                dashboard.</p>
                                            <a href="/viewBusiness/{{ $business->id }}"
                                                class="mt-1 text-sm text-gray-600 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">View
                                                Your Profile
                                            </a>
                                            <a onclick="confirmDelete({{ $business->id }}); event.preventDefault();"
                                                href="deleteBusinessandUser/{{ $business->id }}"
                                                class="mt-1 text-sm text-gray-600 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                Delete Profile
                                            </a>
                                            <div id="deleteConfirmation" class="hidden">
                                                <p class="mt-4 text-sm text-gray-600">Are you sure you want to delete
                                                    your user profile and your business profile?</p>
                                                <div class="mt-2">
                                                    <button onclick="cancelDelete()"
                                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Cancel</button>
                                                    <button onclick="approveDelete({{ $business->id }})"
                                                        class="ml-2 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ss">
                                            <form class="form-group" method="POST"
                                                action="{{ route('business.update') }}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id"
                                                    value="{{ $business->id ?? '' }}">
                                                <div class="shadow overflow-hidden sm:rounded-md mb-5">
                                                    <div class="px-4 py-5 bg-white sm:p-6">
                                                        <div class="grid grid-cols-12 gap-6">
                                                            <div class="col-span-12 md:col-span-6">
                                                                <label for="business_name"
                                                                    class="block text-sm font-medium text-gray-700">Business
                                                                    Name
                                                                    @error('business_name')
                                                                        <p class="text-red-500 text-medium">
                                                                            {{ $message }}
                                                                        </p>
                                                                    @enderror
                                                                </label>
                                                                <input type="text" name="business_name"
                                                                    value="{{ $business->business_name ?? '' }}"
                                                                    id="business_name" autocomplete="given-name"
                                                                    class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                                                            </div>
                                                            <div class="col-span-12 md:col-span-6">
                                                                <label for="business_number"
                                                                    class="block text-sm font-medium text-gray-700">Business
                                                                    Number
                                                                    @error('business_number')
                                                                        <p class="text-red-500 text-medium">
                                                                            {{ $message }}
                                                                        </p>
                                                                    @enderror
                                                                </label>
                                                                <input type="text" name="business_number"
                                                                    value="{{ $business->business_number ?? '' }}"
                                                                    id="business_number" autocomplete="given-name"
                                                                    class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-12">
                                                                <label for="email"
                                                                    class="block text-sm font-medium text-gray-700">Email
                                                                    address
                                                                    @error('email')
                                                                        <p class="text-red-500 text-medium">
                                                                            {{ $message }}
                                                                        </p>
                                                                    @enderror
                                                                </label>
                                                                <input type="text"
                                                                    value="{{ $business->email ?? '' }}"
                                                                    name="email" id="email"
                                                                    autocomplete="email"
                                                                    class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-12">
                                                                <label for="about"
                                                                    class="block text-sm font-medium text-gray-700">
                                                                    Tell us more about your business.
                                                                    @error('business_bio')
                                                                        <p class="text-red-500 text-medium">
                                                                            {{ $message }}
                                                                        </p>
                                                                    @enderror
                                                                </label>
                                                                <div class="mt-1">
                                                                    <textarea style="height: 200px" id="business_bio" name="business_bio" onkeyup="charcountupdate(this.value);"
                                                                        rows="3"
                                                                        class="shadow-sm focus:ring-green-500 focus:border-green-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                                                        placeholder="Aboout Your Business">{{ $business->business_bio ?? ('' ?? '') }}</textarea>
                                                                    <span
                                                                        class="block text-sm font-medium text-gray-700 mt-3"
                                                                        id=charcount></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-span-12 md:col-span-12 ">
                                                                <label for="company_reg"
                                                                    class="block text-sm font-medium text-gray-700">Company
                                                                    Registration Number
                                                                    @error('company_reg')
                                                                        <p class="text-red-500 text-medium">
                                                                            {{ $message }}
                                                                        </p>
                                                                    @enderror
                                                                </label>
                                                                <input type="text"
                                                                    value="{{ $business->company_reg ?? '' }}"
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
                                                                    @if ($industries ?? '')
                                                                        @php
                                                                            $sortedIndustries = $industries->sortByDesc('id');
                                                                        @endphp
                                                                        @foreach ($sortedIndustries as $industry)
                                                                            <option value="{{ $industry->id ?? '' }}"
                                                                                {{ $industry->id === $business->industryId ? 'selected' : '' }}>
                                                                                {{ $industry->industry }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-12">
                                                                <label for="website"
                                                                    class="block text-sm font-medium text-gray-700">Website</label>
                                                                <input type="text"
                                                                    value="{{ $business->website ?? '' }}"
                                                                    name="website" id="website"
                                                                    autocomplete="address-level2"
                                                                    class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                            </div>
                                                            <div class="col-span-12 md:col-span-4 ">
                                                                <label for="facebook"
                                                                    class="block text-sm font-medium text-gray-700">Facebook</label>
                                                                <input type="text"
                                                                    value="{{ $business->facebook ?? '' }}"
                                                                    name="facebook" id="facebook"
                                                                    autocomplete="address-level2"
                                                                    class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                            </div>
                                                            <div class="col-span-12 md:col-span-4 ">
                                                                <label for="twitter"
                                                                    class="block text-sm font-medium text-gray-700">Twitter</label>
                                                                <input type="text"
                                                                    value="{{ $business->twitter ?? '' }}"
                                                                    name="twitter" id="twitter"
                                                                    autocomplete="address-level2"
                                                                    class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                            </div>
                                                            <div class="col-span-12 md:col-span-4 ">
                                                                <label for="instagram"
                                                                    class="block text-sm font-medium text-gray-700">Instagram</label>
                                                                <input type="text"
                                                                    value="{{ $business->instagram ?? '' }}"
                                                                    name="instagram" id="instagram"
                                                                    autocomplete="address-level2"
                                                                    class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                            </div>
                                                            <div class="col-span-12">
                                                                <label for="logo"
                                                                    class="block text-sm font-medium text-gray-700">
                                                                    Logo
                                                                    @error('logo')
                                                                        <p class="text-red-500 text-medium">
                                                                            {{ str_replace('logo field', 'logo', $message) }}
                                                                        </p>
                                                                    @enderror
                                                                </label>
                                                                <div
                                                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                                                    <x-img-upload image="{{ $post->icon ?? '' }}"
                                                                        classing="bigTall" />
                                                                    @if (!empty($business->logo))
                                                                        <img style="width: 250px"
                                                                            src="/img/{{ $business->logo }}"
                                                                            alt="{{ $business->logo }}"
                                                                            srcset="">
                                                                    @endif
                                                                </div>
                                                                <div class="mt-1 flex items-center">
                                                                    <button id="change-logo-btn" type="button"
                                                                        class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                                        Change
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--other form-->
                                                @include('business.viewbusiness.location')
                                            </form>
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
                                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                                    <div class="bg-white space-y-6 sm:p-6">
                                                        <form action="{{ route('updateProfile') }}" method="POST">
                                                            @csrf
                                                            <div
                                                                class="grid md:grid-cols-2 sm:grid-cols-2 gap-5 px-4 py-4">
                                                                <div class="col-span-2 sm:col-span-1">
                                                                    <label for="company-rep"
                                                                        class="font-bold block text-sm font-medium text-gray-700">
                                                                        Company Representative
                                                                    </label>
                                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                                        <input type="text"
                                                                            value="{{ $rep->name ?? '' }}"
                                                                            name="company_rep" id="company-rep"
                                                                            class="focus:ring-green-500 focus:border-green-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                                    </div>
                                                                </div>
                                                                <div class="col-span-2 sm:col-span-1">
                                                                    <label for="company-email"
                                                                        class="font-bold block text-sm font-medium text-gray-700">
                                                                        Email Address
                                                                    </label>
                                                                    <div id="servicesList">
                                                                        <div class="mt-1 flex rounded-md shadow-sm">
                                                                            <input type="text"
                                                                                value="{{ $rep->email ?? '' }}"
                                                                                name="company_email"
                                                                                id="company-email"
                                                                                class="focus:ring-green-500 focus:border-green-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                                                placeholder="www.example.com">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="grid md:grid-cols-2 sm:grid-cols-2 gap-5 px-4">
                                                                <div class="md:col-span-1 sm:col-span-2">
                                                                    <p class="block text-sm font-medium text-gray-700">
                                                                        <span
                                                                            class="font-bold">Created:</span>{{ $rep->created_at ?? '' }}
                                                                    </p>
                                                                </div>
                                                                <div class="md:col-span-1 sm:col-span-2">
                                                                    <button type="submit"
                                                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                                        Save
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </form>

                                                        <div class="md:col-span-1 sm:col-span-2 px-4 mb-3">
                                                            <label for="company-website"
                                                                class="font-bold block text-sm font-medium text-gray-700">
                                                                Verification Status
                                                            </label>
                                                            <div id="verificationwrap"
                                                                class="mt-2 d-flex align-items-center justify-content-start">
                                                                @if ($business->email_verified_at == 0)
                                                                    <form method="POST"
                                                                        action="{{ route('verification.send') }}">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 bg-yellow-600 hover:bg-yellow-700">
                                                                            Resend verification Email
                                                                        </button>
                                                                    </form>
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
                                                    @foreach ($industries as $key => $industry)
                                                        @if ($industries[$key]->id == $business->industryId)
                                                            <form class="ajax"
                                                                action="/business/businessdashboard/insertclientservice"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="bid"
                                                                    value="{{ $business->id }}">
                                                                <input type="hidden" name="industryId"
                                                                    value="{{ $industries[$key]->id }}">
                                                                <div class="shadow overflow-hidden sm:rounded-md">
                                                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                                                        <fieldset
                                                                            class="md:grid md:grid-cols-12 md:gap-6">
                                                                            <legend
                                                                                class="md:col-span-12 text-base font-medium text-gray-900">
                                                                                <h3>{{ $industry->industry }}</h3>
                                                                            </legend>
                                                                            @if ($services ?? '')
                                                                                @php
                                                                                    $i = 0;
                                                                                    $x = 0;
                                                                                @endphp
                                                                                @for ($i = 0; $i < count($services); $i++)
                                                                                    @if ($services[$i]->industryId === $industries[$key]->id)
                                                                                        <div
                                                                                            class="mt-1 space-y-4 md:col-span-12">
                                                                                            <div
                                                                                                class="flex items-start">
                                                                                                <div
                                                                                                    class="flex items-center h-5">
                                                                                                    <input
                                                                                                        name="serviceId[]"
                                                                                                        value="{{ $services[$i]->id }}"
                                                                                                        type="checkbox"
                                                                                                        class="mr-3 focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300 rounded"
                                                                                                        @for ($x = 0; $x < count($clientsservices) ; $x++) @if ($services[$i]->id === $clientsservices[$x]->serviceId)
                                                                                    @php echo "checked"; @endphp @endif @endfor>
                                                                                                    <label
                                                                                                        for="comments"
                                                                                                        class="font-medium text-gray-700">@php
                                                                                                            echo $services[$i]->service_name;
                                                                                                        @endphp
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                @endfor
                                                                            @endif
                                                                        </fieldset>
                                                                    </div>
                                                                    <div
                                                                        class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                                                        <button type="submit"
                                                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                                            Save
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="md:mt-8 md:col-span-2 grid grid-cols-3 gap-6">
                                                                </div>
                                                            </form>
                                                        @endif
                                                    @endforeach
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
    <div class="container py-12">
        <div class="row max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-md-12">
                <div class="row">
                    @if ($message = session('success'))
                        <div id="success-message" class="alert alert-success">
                            {{ $message }}
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                setTimeout(function() {
                                    $('#success-message').fadeOut('slow');
                                }, 2000);
                            });
                        </script>
                    @endif
                    <div class="col">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="newIndustry" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="newIndustryLabel" aria-hidden="true">
        <form class="ajax form-group" data-target="insertIndustry" id="insertIndustry"
            action="{{ route('business.businessdashboard.insertIndustry') }}" method="post">
            @csrf
            <input type="hidden" name="approval_type" value="new industry">
            <input type="hidden" name="who_id" value="{{ auth()->user()->id }} ">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newIndustryLabel">Enter New Industry</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success d-none" id="success-message"></div>
                        <div class="alert alert-danger d-none" id="error-message"></div>
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
        if (input.files && input.files) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#logo-preview').attr('src', '').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files);
            $('#logo-preview').show();
        }

    }
    $(document).ready(function() {
        $("#change-logo-btn").click(function() {
            $('#logo-preview').attr('src', '').show();
            $("#file-upload").trigger("click");
        });

        $("input[type='file']").change(function() {
            readURL(this);
        });

    });

    jQuery(document).ready(function() {
        var selectedprovinceId = $(this).find(":selected").val();

        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('change', '#industryId', function(e) {
            e.preventDefault();

            var otherOption = $(this).find(":selected").val();
            if (otherOption === "1") {
                console.log("Other option selected");
                $('#newIndustry').modal('show');
            }
        });


        $(function() {
            $('#insertIndustry').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#success-message').html(response.message)
                            .removeClass(
                                'd-none');
                        setTimeout(function() {
                            $('#newIndustry').modal('hide');
                        }, 2000);
                    },
                    error: function(xhr, status, error) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.message) {
                            $('#error-message').html(response.message)
                                .removeClass(
                                    'd-none');
                            setTimeout(function() {
                                $('#error-message').addClass(
                                    'd-none').html(
                                    '');
                            }, 5000);
                        }
                    }
                });
            });
            $('#newIndustry').on('hidden.bs.modal', function() {
                $('#success-message').addClass('d-none').html('');
                $('#error-message').addClass('d-none').html('');
            });
        });


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
            changeTown(provinceId);
        });
        jQuery(document).on('change', '#districtOptions', function() {
            var query = jQuery(this).val(),
                searchOption = "industrySearch",
                viewType = "cardView";
            var provinceId = $(this).find(":selected").val();
            changeMunicipality(provinceId);
        });

    });

    function confirmDelete(id) {
        document.getElementById("deleteConfirmation").classList.remove("hidden");
    }

    function cancelDelete() {
        document.getElementById("deleteConfirmation").classList.add("hidden");
    }

    function approveDelete(id) {
        // Display a confirmation dialog
        if (confirm(
                "This will delete your user profile and your business profile. Are you sure you want to proceed?")) {
            // Perform the deletion operation using the provided id
            window.location.href = "deleteBusinessandUser/" + id;
        }
    }
    //bio script
    function charcountupdate(value) {
        const maxLength = 1000;
        const charCount = value.length;
        const charCountElement = document.getElementById('charcount');
        charCountElement.textContent = `${charCount} / ${maxLength}`;

        // Disable further typing if the limit is reached
        if (charCount >= maxLength) {
            document.getElementById('business_bio').setAttribute('readonly', 'readonly');
        } else {
            document.getElementById('business_bio').removeAttribute('readonly');
        }
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

    function changeTown($id) {
        jQuery.ajax({
            url: "{{ route('home.changeTown') }}",
            menthod: 'GET',
            data: {
                id: $id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);

                jQuery('#townOptions')
                    .find('option')
                    .remove()
                    .end();
                data.forEach(town => {
                    console.log(town);
                    console.log(town.town);
                    console.log(town.id);
                    jQuery('#townOptions')
                        .append('<option value="' + town.id + '">' + town
                            .town +
                            '</option>');
                });
                $("#townOptions").val($("#townOptions option:first").val());
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
            method: 'GET',
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
                        .append('<option value="' + municipality.id + '">' + municipality
                            .municipality +
                            '</option>');
                });
                $("#municipalityOptions").val($("#municipalityOptions option:first").val());

            }
        });



    }
</script>
