<x-app-layout title="View Business">
    <div class="px-6 max-w-7xl mx-auto lg:px-8 grid grid-cols-1 gap-4 my-3">
        <nav class="bg-grey-light rounded font-sans w-full">
            <ol class="list-reset flex text-grey-dark">
                <li><a href="/home" class="font-bold">Home</a></li>
                <li><span class="mx-2">/</span></li>
                <li>{{ $business[0]->business_name }}</li>
            </ol>
        </nav>
    </div>
    <div class="px-6 max-w-7xl mx-auto lg:px-8 grid grid-cols-3 md:grid-cols-12 gap-4">
        <div class="col-span-3">
            <div class="inline-block rounded-lg shadow logo_frame">
                <img src="/img/{{$business[0]->logo}}" alt="" srcset="">
            </div>
        </div>
        <div class="col-span-3 md:col-span-9">
            <div class="md:col-span-9">
                <h1 class="font-black text-3xl">{{ $business[0]->business_name }}</h1>
                <p class="my-1 md:col-span-6"><span class="bg-yellow-600 text-yellow-100 rounded-md px-3 text-sm font-medium leading-5">{{ $business[0]->industry }}</span></p>
            </div>
            <div class="grid grid-rows-5 sm:grid-rows-none md:grid-cols-4 p-6 bg-white border-b border-gray-200">
                <div class="">
                    <span class="font-black">Email:</span>
                    <br>
                    <a href="mailto:{{$business[0]->email}}" class="text-sm font-medium leading-5 text-gray-500">{{$business[0]->email}}</a>
                </div>
                <div class="">
                    <span class="font-black">Contact:</span>
                    <br>
                    <a href="tel:+{{$business[0]->business_number}}" class="text-sm font-medium leading-5 text-gray-500">{{$business[0]->business_number}}</a>
                </div>
                <div class="">
                    <span class="font-black">Website:</span>
                    <br>
                    <a href="{{$business[0]->website}}" target="_blank" class="text-sm font-medium leading-5 text-gray-500">{{$business[0]->website}}</a>
                </div>
                @if( $business[0]->website ?? '' )
                <a href="http://{{ $business[0]->website}}" target="_blank" rel="noopener noreferrer" class="mt-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 col-start-1 col-end-2">Go to our Website</a>
                @endif
            </div>
        </div>
    </div>
    <div class="px-6 lg:px-8 sm:grid sm:grid-cols-5 gap-4">
        @include('business.viewbusiness.about')
        @include('business.viewbusiness.services')
    </div>
    <div class="px-6 max-w-7xl mx-auto sm:px-6 lg:px-8 pb-6 grid grid-cols-3 md:grid-cols-3 gap-4">
        <div class="col-span-3 md:col-span-1">

            @include('business.viewbusiness.location')
            @include('business.viewbusiness.testimonials')

        </div>
        <div class="col-span-3 md:col-span-2">

        </div>
    </div>
</x-app-layout>