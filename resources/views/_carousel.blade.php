<div class="jumbotron bg-gray-400 bg-gradient position-relative">
    <div class="owl-carousel owl-theme" id="headercara">

        <x-carousel-item pic="../img/carousel/server_bae.png" topTitle="Aaaa" mainTitle="asasA" bottomTitle="dddd" />
        <x-carousel-item pic="../img/carousel/skills2.jpg" topTitle="We specialize" mainTitle="Commercial Cleaning"
            bottomTitle="dddd" />
    </div>
    <div class="search-bar">
        <div class="p-2 ml-16 md:px-10">
            <div class="flex items-center border rounded-lg">
                <div class="relative-16">
                    <form class="flex" action="/search" id="searchForm" role="search" method="get"
                        wtx-context="0F597C7B-F589-4E02-8330-57B884DD41B2">
                        <div class="flex items-center">

                            <div class="relative">
                                <label class="text-gray-600 font-semibold" for="search_description">
                                    <div
                                        class="inline-block w-6 h-6 absolute left-3 top-1/2 transform -translate-y-1/2 text-black-400 stroke-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 100 100">
                                            <circle cx="40" cy="40" r="30" fill="none"
                                                stroke="black" stroke-width="2" />
                                            <line x1="60" y1="60" x2="90" y2="90"
                                                stroke="black" stroke-width="2" />
                                        </svg>

                                    </div>
                                    <input aria-label="Find" autocomplete="off" role="textbox" aria-autocomplete="list"
                                        tabindex="0" name="search" data-testid="suggest-desc-input" id="liveSearch"
                                        class="py-2 pl-10 pr-3 bg-gray-100 rounded-md border border-green-300 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                        type="text" placeholder="What's on your mind??" value=""
                                        wtx-context="3A6C263E-3349-4427-BC18-53E01C7A4833" />
                                </label>
                                <div id="dropdown"
                                    class="hidden absolute bg-white border border-gray-300 mt-2 w-full z-10">
                                    <div class="dropdown-item px-3 py-2 cursor-pointer hover:bg-green-300">Plumbing
                                    </div>
                                    <div class="dropdown-item px-3 py-2 cursor-pointer hover:bg-green-300">Auto Repairs
                                    </div>
                                    <div class="dropdown-item px-3 py-2 cursor-pointer hover:bg-green-300">Hair and
                                        beauty</div>
                                </div>
                            </div>
                        </div>
                        <!-- Rest of your form and button code -->
                    </form>
                </div>
                <!-- Location search -->

                <div class="relative">
                    <label class="text-gray-700 font-semibold relative" for="search_location">
                        <span class="inline-block w-6 h-6 absolute top-2 left-2">
                            <svg width="30px" height="30px" viewBox="0 0 100 150" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#0000ff">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M50 0C72.3858 0 91.6667 19.2809 91.6667 41.6667C91.6667 58.5698 79.9449 76.4698 55.6803 101.485C51.5551 105.726 46.4449 105.726 42.3197 101.485C18.0551 76.4698 6.33333 58.5698 6.33333 41.6667C6.33333 19.2809 25.6142 0 48 0ZM48 25C56.2843 25 63.3333 32.049 63.3333 40.3333C63.3333 48.6177 56.2843 55.6667 48 55.6667C39.7157 55.6667 32.6667 48.6177 32.6667 40.3333C32.6667 32.049 39.7157 25 48 25Z"
                                        fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M48 85.3333C54.6282 85.3333 60 79.9615 60 73.3333C60 66.7051 54.6282 61.3333 48 61.3333C41.3718 61.3333 36 66.7051 36 73.3333C36 79.9615 41.3718 85.3333 48 85.3333Z"
                                        fill="currentColor"></path>
                                </g>
                            </svg>
                        </span>
                        <select aria-label="Near" autocomplete="off" role="textbox" aria-autocomplete="list"
                            tabindex="0" data-testid="suggest-location-input"
                            class="py-2 px-6  ml-2 bg-gray-100 rounded-md border border-green-300 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            id="provinceOptions">
                            <option value="" disabled selected>Location, Address, City</option>
                            @if ($provinces ?? '')
                                @foreach ($provinces ?? '' as $province)
                                    <option value="{{ $province->id }}" data-name="{{ $province->province }}">
                                        {{ $province->province }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </label>
                    <button aria-label="Search" type="submit"
                        class="py-2 px-4 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600"
                        data-activated="false" data-testid="suggest-submit" value="submit" data-button="true">
                        Search
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
