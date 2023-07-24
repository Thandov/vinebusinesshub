        <!-- 3 card -->
        <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl">
            <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-500 left-4 -top-6">
                <!-- svg  -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </div>
            <div class="mt-8">
                <p class="text-xl font-semibold my-2">Our Services</p>
                <div class="flex space-x-2 text-gray-400 text-sm">
                    <p>We offer the following services to our clients</p>
                </div>
                <div class="flex-row space-y-2 text-gray-400 text-sm my-3">

                    @if ($clientsservices ?? '')
                    @for ($i = 0; $i < count($clientsservices); $i++) @if ($clientsservices[$i]->service_name)
                        <p class="">{{ $clientsservices[$i]->service_name }}</p>
                        @endif
                        @endfor
                        @endif
                </div>
                <div class="border-t-2 mb-3"></div>
                <span class="bg-yellow-600 mt-2 text-yellow-100 rounded-md px-3 text-sm font-medium leading-5">{{ $business[0]->industry }}</span>
            </div>
        </div>

        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="font-black text-3xl">Our Services</h1>
            <div class="grid md:grid-cols-3">
                <div class="md:col-span-3 py-3">
                    <h3 class="text-medium leading-5 text-gray-500 font-bold">Industry:</h3>
                    <p>
                        <span class="bg-yellow-600 text-yellow-100 rounded-md px-3 text-sm font-medium leading-5">{{ $business[0]->industry }}</span>
                    </p>
                </div>
                <div class="md:col-span-3">
                    <p class="text-sm font-medium leading-5 text-gray-500">We offer the following services
                        to our clients</p>
                    <hr>
                    <ol class="py-3 ml-5" style="list-style: block">
                        @if ($clientsservices ?? '')
                        @for ($i = 0; $i < count($clientsservices); $i++) @if ($clientsservices[$i]->service_name)
                            <li>
                                <p class="">{{ $clientsservices[$i]->service_name }}</p>
                            </li>
                            @endif
                            @endfor
                            @endif
                    </ol>
                </div>
                <div class="md:col-span-3">
                    <p class="text-sm font-medium leading-5 text-gray-500">Our Location</p>
                    <hr>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2">
                        <div class="col-span-2 my-2">
                            <p class="text-sm font-medium leading-5 text-gray-500">
                                <span class="font-bold">Province:</span> {{ $business[0]->province ?? '' }}
                            </p>
                        </div>
                        <div class="col-span-2 mb-2">
                            <p class="text-sm font-medium leading-5 text-gray-500">
                                <span class="font-bold">District:</span>
                                {{ $business[0]->municipal_district ?? '' }}
                            </p>
                        </div>
                        <div class="col-span-2 mb-2">
                            <p class="text-sm font-medium leading-5 text-gray-500">
                                <span class="font-bold">Municipality:</span>
                                {{ $business[0]->municipality ?? '' }}
                            </p>
                        </div>
                        <div class="col-span-2 mb-2">
                            <p class="text-sm font-medium leading-5 text-gray-500">
                                <span class="font-bold">Town:</span> {{ $business[0]->town ?? '' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>