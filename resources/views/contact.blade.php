<x-app-layout>
<<<<<<< Updated upstream
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-3 d-flex align-items-center justify-content-center contact-widget-section2 wow animated fadeInLeft"
=======
    <div class="container md:flex justify-center py-5 px-4 md:px-8 max-w-screen-xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-4 lg:gap-5">
            <!-- Section Titile -->
            <div class="d-flex align-items-center justify-content-center contact-widget-section2 wow animated fadeInLeft"
>>>>>>> Stashed changes
                data-wow-delay=".2s">
                <div>
                    <div class="row">
                        <div class="col-md-12 wow animated fadeInLeft" data-wow-delay=".2s">
                            <h1 class="text-4xl text-green-700 font-black">Love to Hear From You</h1>
                        </div>
                    </div>
                    <p class="font-bold py-3">You can get in touch with us.</p>

                    <div class="find-widget">
                        <span class="text-green-700 font-black">Company:</span>
                        <a href="https://thevinebusinesshub.co.za/home">The Vine SA</a><br>
                    </div>
                    <div class="find-widget">
                        <span class="text-green-700 font-black">Address:</span>
                        <a
                            href="https://www.google.co.za/maps/dir//39BROWN+STREET+NELBRO+BUILDING+UNIT+5,+39+Brown+St,+Mbombela,+1200/@-25.4724551,30.9735451,17z/data=!4m18!1m9!4m8!1m0!1m6!1m2!1s0x1ee84baec74c27bb:0x5e355fa1a9e20f7c!2s39BROWN+STREET+NELBRO+BUILDING+UNIT+5,+39+Brown+St,+Mbombela,+1200!2m2!1d30.97612!2d-25.47246!4m7!1m0!1m5!1m1!1s0x1ee84baec74c27bb:0x5e355fa1a9e20f7c!2m2!1d30.97612!2d-25.47246?entry=ttu">39
                            Brown St, Mbombela</a><br>
                    </div>
                    <div class="find-widget">
                        <span class="text-green-700 font-black">Email:</span>
                        <a href="mailto:thapelo@kayiseit.com">info@thevinesa.co.za</a><br>
                    </div>
                    <img src="../img/logo.png" alt="the vine sa" srcset="" id="contactLogo" class="my-4">
                </div>
            </div>
<<<<<<< Updated upstream

            <div class="col-md-6 wow animated fadeInRight pt-5" data-wow-delay=".2s">
=======
            <!-- contact form -->
            <div class="wow animated fadeInRight" data-wow-delay=".2s">
>>>>>>> Stashed changes
                <form class="bg-white rounded-lg shadow p-12" role="form" method="post" id="contactForm"
                    name="contact-form" data-toggle="validator" action="{{ route('contact.contact') }}">
                    @csrf


                    <!-- Name -->
                    <div class="form-group label-floating">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your Name"
                            class="appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            required data-error="Please enter your name">
                        <div class="help-block with-errors"></div>
                    </div>

                    <!-- Email -->
                    <div class="form-group label-floating">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your Email"
                            class="appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            required data-error="Please enter your email">
                        <div class="help-block with-errors"></div>
                    </div>

                    <!-- Subject -->
                    <div class="form-group label-floating">
                        <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                        <input type="text" name="subject" id="subject" placeholder="Enter your Subject"
                            class="appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            required data-error="Please enter your subject">
                        <div class="help-block with-errors"></div>
                    </div>

                    <!-- Message -->
                    <div class="form-group label-floating">
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea
                            class="appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            rows="3" id="message" name="message" required data-error="Write your message"></textarea>
                        <div class="help-block with-errors"></div>
                    </div>

                    <!-- Form Submit -->
                    <div class="form-submit">
                        <button
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                            type="submit" id="form-submit">
                            <i class="material-icons mdi mdi-message-outline"></i> Send Message
                        </button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
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
