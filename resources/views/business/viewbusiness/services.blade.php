<div class="col-span-3">
    <h1 class="font-black text-3xl py-3">Our Services</h1>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white">
            <div class="col">
                <div class="md:grid md:grid-cols-3">
                    <p class="md:col-span-6">
                        <span class="bg-yellow-600 text-yellow-100 rounded-md px-3 text-sm font-medium leading-5">{{ $business[0]->industry }}</span>
                    </p>
                </div>
                <p class="text-sm font-medium leading-5 text-gray-500">We offer the following services to our clients</p>
                <ol class="my-2 ml-5" style="list-style: block">
                    @if($clientsservices ?? '')
                    @for($i=0; $i <count($clientsservices); $i++) @if( $clientsservices[$i]->
                        service_name)
                        <li>
                            <p class="">{{$clientsservices[$i]->service_name}}</p>
                        </li>
                        @endif @endfor @endif
                </ol>
                <a href="tel:{{$business[0]->business_number }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Contact</a>
            </div>
        </div>
    </div>
</div>