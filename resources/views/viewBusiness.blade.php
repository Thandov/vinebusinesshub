<x-app-layout title="View Business">
    <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <nav class="bg-grey-light rounded font-sans w-full">
            <ol class="list-reset flex text-grey-dark">
                <li>
                    <a href="/" class="font-bold">Home</a>
                </li>
                <li>
                <li>
                    <span class="mx-2">/</span>
                </li>
                <li>{{ $business->business_name }}</li>
            </ol>
        </nav>
    </div>
    <div class="container md:flex justify-center py-1 px-4 md:px-8 max-w-screen-xl mx-auto">
        <div class="grid grid-cols-12 justify-center mx-auto gap-3">
            <div class="md:col-span-8 col-span-12 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div
                                    class=" inline-block rounded-lg shadow-lg logo_frame mr-5 overflow-hidden d-flex align-items-center justify-content-center">
                                    <img src="/img/{{ $business->logo }}" alt="" srcset="">
                                </div>
                            </div>
                            <div class="col-md-9 d-flex align-items-center justify-content-start">
                                <div class="">
                                    <div class="row">
                                        <div class="col">
                                            <h1 class="font-black text-3xl">{{ $business->business_name }}</h1>
                                        </div>
                                    </div>
                                    <div class="">
                                        <p class="text-sm font-medium leading-5 text-gray-500">
                                            {{ $business->business_bio }}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">

                        <div class="row py-2">
                            <div class="col-md-12 align-items-center justify-content-center">
                                <span class="font-black">Email:</span>
                                <br>
                                <a href="mailto:{{ $business->email }}"
                                    class="text-sm font-medium leading-5 text-gray-500">{{ $business->email }}</a>
                            </div>
                            <div class="col-md-12 align-items-center justify-content-center">
                                <span class="font-black">Contact:</span>
                                <br>
                                <a href="tel:+{{ $business->business_number }}"
                                    class="text-sm font-medium leading-5 text-gray-500">{{ $business->business_number }}</a>
                            </div>
                            <div class="col-md-12 align-items-center justify-content-center">
                                <span class="font-black">Website:</span>
                                <br>
                                <a href="http://{{ $business->website }}" target="_blank"
                                    class="text-sm font-medium leading-5 text-gray-500">{{ $business->website }}</a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-center">
                            <div class="container">
                                <div class="row">

                                </div>
                                <div class="row py-2">
                                    @if ($business->facebook)
                                        <div class="col-4 d-flex align-items-center justify-content-center">
                                            <a href="http://www.facebook.com/{{ $business->facebook }}" target="_blank"
                                                rel="noopener noreferrer">
                                                <img style="width: 25px" src="../img/facebook.png" alt=""
                                                    srcset="">
                                            </a>
                                        </div>
                                    @endif
                                    @if ($business->twitter)
                                        <div class="col-4 d-flex align-items-center justify-content-center">
                                            <a href="http://www.twitter.com/{{ $business->twitter }}" target="_blank"
                                                rel="noopener noreferrer">
                                                <img style="width: 25px" src="../img/twitter.png" alt=""
                                                    srcset="">
                                            </a>
                                        </div>
                                    @endif
                                    @if ($business->instagram)
                                        <div class="col-4 d-flex align-items-center justify-content-center">
                                            <a href="http://www.instagram.com/{{ $business->instagram }}"
                                                target="_blank" rel="noopener noreferrer">
                                                <img style="width: 25px" src="../img/instagram.png" alt=""
                                                    srcset="">
                                            </a>
                                        </div>
                                    @endif
                                    @if ($business->website ?? '')
                                        <a href="http://{{ $business->website }}" target="_blank"
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
            <div class="md:col-span-4 col-span-12 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @include('business/viewbusiness/_services')
            </div>


        </div>
    </div>
</x-app-layout>
