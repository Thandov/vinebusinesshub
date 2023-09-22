<x-app-layout title="About Us">
    <div class="jumbotron aboutHeading grid grid-cols-1 md:grid-cols-6 py-12 px-12">
        <h1 class="col-span-1 md:col-span-6 col-start-2 display-4">The Vine SA</h1>
        <p class="col-span-1 md:col-span-6 col-start-2 lead">Connecting you to your local businesses.</p>

    </div>
    <a href="#" class="mx-5">
        <div class="box w-96 h-96 rounded-lg overflow-hidden bg-white shadow-md hover:shadow-lg border">
            <div class="bg-cover bg-center rounded-t-lg h-2/3" style="background-image: url(../img/placeholder/placeholder.jpeg)"></div>

            <div class=" h-1/3">
                <div class="font-bold text-xl text-green-600 px-3 pt-3">The Vine SA</div>
                <p class="text-sm text-blue-700 font-bold py-1 px-3">industry</p>
                <div class="flex justify-start">
                    <p class="text-sm font-light px-3">123 business str, Mbombela, 1201</p>
                </div>
            </div>
        </div>
    </a>

    <div class="grid grid-cols-1 md:grid-cols-6 my-12">

        <div class="col-span-3 grid place-items-center">
            <img src="../img/logo.png" alt="the vine sa" srcset="" id="aboutLogo">

        </div>

        <div class="col-span-2 grid place-items-center">
            <p class="text-sm">The Vine SA is tailor made for business owners to have a place to advertise their
                businesses and for them to outline all their products and services as well as their contact information
                and also share their social media handles. This will allow all the consumers from all over our beautiful
                country South Africa, to easily access companies in and around their areas and it will alleviate the
                struggle of having to search endlessly without finding exactly what you are looking for.</p>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-6 position-relative">
        <div class="col-span-2 grid place-items-center stockimgs">
            <h4 class="hover:text-green-700 text-3xl text-bold">Relevant</h4><img src="../img/about/p1.jpeg" />
        </div>
        <div class="col-span-2 grid place-items-center stockimgs">
            <h4 class="hover:text-green-700 text-3xl text-bold">Online</h4><img src="../img/about/p2.jpeg" />
        </div>
        <div class="col-span-2 grid place-items-center stockimgs">
            <h4 class="hover:text-green-700 text-3xl text-bold">Click</h4><img src="../img/about/p3.jpeg" />
        </div>
    </div>


</x-app-layout>