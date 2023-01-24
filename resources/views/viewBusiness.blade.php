<x-app-layout title="View Business">
    <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="row">
            <div class="col">
                <nav class="bg-grey-light rounded font-sans w-full">
                    <ol class="list-reset flex text-grey-dark">
                        <li>
                            <a href="/home" class="font-bold">Home</a>
                        </li>
                        <li>
                        <li>
                            <span class="mx-2">/</span>
                        </li>
                        <li>{{ $business[0]->business_name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div
                                    class="inline-block rounded-lg shadow-lg logo_frame mr-5 overflow-hidden d-flex align-items-center justify-content-center">
                                    <img src="/img/{{$business[0]->logo}}" alt="" srcset="">
                                </div>
                            </div>
                            <div class="col-md-9 d-flex align-items-center justify-content-start">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <h1 class="font-black text-3xl">{{ $business[0]->business_name }}</h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <span class="font-black">Email:</span>
                                            <br>
                                            <a href="mailto:{{$business[0]->email}}"
                                                class="text-sm font-medium leading-5 text-gray-500">{{$business[0]->email}}</a>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="font-black">Contact:</span>
                                            <br>
                                            <a href="tel:+{{$business[0]->business_number}}"
                                                class="text-sm font-medium leading-5 text-gray-500">{{$business[0]->business_number}}</a>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="font-black">Website:</span>
                                            <br>
                                            <a href="{{$business[0]->website}}" target="_blank"
                                                class="text-sm font-medium leading-5 text-gray-500">{{$business[0]->website}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <h1 class="font-black text-3xl pb-3">About {{ $business[0]->business_name }}</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="text-sm font-medium leading-5 text-gray-500">
                                        {{ $business[0]->business_bio }} </p>

                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-center">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <p
                                                    class="text-sm font-medium leading-5 text-gray-500 font-semibold mb-3">
                                                    You can find us on our Social Media Pages
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row py-2">
                                            @if( $business[0]->facebook )
                                            <div class="col-4 d-flex align-items-center justify-content-center">
                                                <a href="http://www.facebook.com/{{$business[0]->facebook}}"
                                                    target="_blank" rel="noopener noreferrer">
                                                    <img style="width: 25px" src="../img/facebook.png" alt="" srcset="">
                                                </a>
                                            </div>
                                            @endif
                                            @if( $business[0]->twitter )
                                            <div class="col-4 d-flex align-items-center justify-content-center">
                                                <a href="http://www.twitter.com/{{$business[0]->twitter}}"
                                                    target="_blank" rel="noopener noreferrer">
                                                    <img style="width: 25px" src="../img/twitter.png" alt="" srcset="">
                                                </a>
                                            </div>
                                            @endif
                                            @if( $business[0]->instagram )
                                            <div class="col-4 d-flex align-items-center justify-content-center">
                                                <a href="http://www.instagram.com/{{$business[0]->instagram}}"
                                                    target="_blank" rel="noopener noreferrer">
                                                    <img style="width: 25px" src="../img/instagram.png" alt=""
                                                        srcset="">
                                                </a>
                                            </div>
                                            @endif
                                            @if( $business[0]->website ?? '' )
                                            <a href="http://{{ $business[0]->website}}" target="_blank"
                                                rel="noopener noreferrer"
                                                class="mt-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Go
                                                to our Website</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="pb-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <h1 class="font-black text-3xl">Our Services</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md:grid md:grid-cols-12 py-3">
                                        <h3 class="md:col-span-3 text-medium leading-5 text-gray-500 font-bold">Industry
                                            Type: </h3>
                                        <p class="md:col-span-6">
                                            <span
                                                class="bg-yellow-600 text-yellow-100 rounded-md px-3 text-sm font-medium leading-5">{{ $business[0]->industry }}</span>
                                        </p>
                                    </div>
                                    <p class="text-sm font-medium leading-5 text-gray-500">We offer the following
                                        services to our clients</p>
                                    <hr>
                                    <ol class="py-3 ml-5" style="list-style: block">
                                        @if($clientsservices ?? '')
                                        @for($i=0; $i <count($clientsservices); $i++) @if( $clientsservices[$i]->
                                            service_name)
                                            <li>
                                                <p class="">{{$clientsservices[$i]->service_name}}</p>
                                            </li>
                                            @endif @endfor @endif
                                    </ol>
                                    <a href="tel:{{$business[0]->business_number }}"
                                        class="inline-flex justify-center py-2 py-1 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Contact</a>
                                </div>
                                <div class="col-md-6 py-3">
                                    <div class="col-span-6 sm:col-span-12 lg:col-span-12">
                                        <h3 class="md:col-span-2 text-medium leading-5 text-gray-500 font-bold">
                                            Location: </h3>
                                        <p class="text-sm font-medium leading-5 text-gray-500">
                                            <span class="font-bold">Province: </span>{{ $business[0]->province ?? '' }}
                                        </p>
                                    </div>
                                    <div class="col-span-6 sm:col-span-12 lg:col-span-12">
                                        <p class="text-sm font-medium leading-5 text-gray-500">
                                            <span class="font-bold">District:
                                            </span>{{ $business[0]->municipal_district ?? '' }}
                                        </p>
                                    </div>
                                    <div class="col-span-6 sm:col-span-12 lg:col-span-12">
                                        <p class="text-sm font-medium leading-5 text-gray-500">
                                            <span class="font-bold">Municipality:
                                            </span>{{ $business[0]->municipality ?? '' }}
                                        </p>
                                    </div>
                                    <div class="col-span-6 sm:col-span-12 lg:col-span-12">
                                        <p class="text-sm font-medium leading-5 text-gray-500">
                                            <span class="font-bold">Town: </span>{{ $business[0]->town ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</x-app-layout>