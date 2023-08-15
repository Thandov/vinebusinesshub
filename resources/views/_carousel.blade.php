<div class="jumbotron bg-gray-400 bg-gradient position-relative">
    <div class="owl-carousel owl-theme" id="headercara">

        <x-carousel-item pic="../img/carousel/server_bae.png" topTitle="Aaaa" mainTitle="asasA" bottomTitle="dddd" />
        <x-carousel-item pic="../img/carousel/skills2.jpg" topTitle="We specialize" mainTitle="Commercial Cleaning" bottomTitle="dddd" />
    </div>
    <div class="search-bar">
        <div class="p-2 ml-16 md:px-10">
            <div class="flex items-center border rounded-lg">
                <div class="relative-16">
                    <form class="flex" action="/search" id="header_find_form" role="search" method="get" wtx-context="0F597C7B-F589-4E02-8330-57B884DD41B2">
                        <div class="flex items-center">
                            <div class="relative">
                                <label class="text-gray-600 font-semibold" for="search_description">
                                    <div class="inline-block w-6 h-6 absolute left-3 top-1/2 transform -translate-y-1/2 text-black-400 stroke-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 100 100">
                                            <circle cx="40" cy="40" r="30" fill="none" stroke="black" stroke-width="2" />
                                            <line x1="60" y1="60" x2="90" y2="90" stroke="black" stroke-width="2" />
                                        </svg>

                                    </div>
                                    <input aria-label="Find" autocomplete="off" role="textbox" aria-autocomplete="list" tabindex="0" name="find_desc" data-testid="suggest-desc-input" id="search_description" class="py-2 pl-10 pr-3 bg-gray-100 rounded-md border border-green-300 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" type="text" placeholder="What's on your mind??" value="" wtx-context="3A6C263E-3349-4427-BC18-53E01C7A4833" />
                                </label>
                                <div id="dropdown" class="hidden absolute bg-white border border-gray-300 mt-2 w-full z-10">
                                    <div class="dropdown-item px-3 py-2 cursor-pointer hover:bg-gray-100">Plumbing</div>
                                    <div class="dropdown-item px-3 py-2 cursor-pointer hover:bg-gray-100">Auto Repairs
                                    </div>
                                    <div class="dropdown-item px-3 py-2 cursor-pointer hover:bg-gray-100">Hair and
                                        beauty</div>
                                </div>
                            </div>

                            <div class="relative">
                                <label class="text-gray-700 font-semibold relative" for="search_location">
                                    <span class="inline-block w-6 h-6 absolute top-2 left-0">
                                        <svg width="30px" height="30px" viewBox="0 0 100 150" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#0000ff">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M50 0C72.3858 0 91.6667 19.2809 91.6667 41.6667C91.6667 58.5698 79.9449 76.4698 55.6803 101.485C51.5551 105.726 46.4449 105.726 42.3197 101.485C18.0551 76.4698 6.33333 58.5698 6.33333 41.6667C6.33333 19.2809 25.6142 0 48 0ZM48 25C56.2843 25 63.3333 32.049 63.3333 40.3333C63.3333 48.6177 56.2843 55.6667 48 55.6667C39.7157 55.6667 32.6667 48.6177 32.6667 40.3333C32.6667 32.049 39.7157 25 48 25Z" fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M48 85.3333C54.6282 85.3333 60 79.9615 60 73.3333C60 66.7051 54.6282 61.3333 48 61.3333C41.3718 61.3333 36 66.7051 36 73.3333C36 79.9615 41.3718 85.3333 48 85.3333Z" fill="currentColor"></path>
                                            </g>
                                        </svg>
                                    </span>
                                    <select aria-label="Near" autocomplete="off" role="textbox" aria-autocomplete="list" tabindex="0" data-testid="suggest-location-input" id="search_location" class="py-2 px-6 bg-gray-100 rounded-md border border-green-300 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
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
                                <button aria-label="Search" type="submit" class="py-2 px-4 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600" data-activated="false" data-testid="suggest-submit" value="submit" data-button="true">
                                    Search
                                </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function() {
            jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var selectedprovinceId = $(this).find(":selected").val();
            changeDistrict(selectedprovinceId);
            fetch_customer_data(query = "", searchOption = "", pageNumber = 1);

            jQuery("#liveSearch, #provinceOptions, #districtOptions, #municipalityOptions").on("change",
                function() {
                    jQuery("#industryOptions").val("");
                });

            jQuery(document).on('change', '#provinceOptions', function() {
                var query = $.trim($(this).find('option:selected').text());
                var searchOption = "provinceSearch";
                var viewType = "cardView";
                var pageNumber = jQuery('#pagination-links .active a').text(); // get current page number
                var provinceId = $(this).find(":selected").val();
                changeDistrict(provinceId);
                fetch_customer_data(query, searchOption, pageNumber);
            });


            jQuery(document).on('change', '#industryOptions', function() {
                var query = $.trim($(this).find('option:selected').text());
                var searchOption = "industrySearch";
                var viewType = "cardView";
                var provinceOptions = document.getElementById("provinceOptions");
                var selectedProvince = provinceOptions.selectedIndex !== -1 ? provinceOptions.options[
                    provinceOptions.selectedIndex].text : null;

                var districtOptions = document.getElementById("districtOptions");
                var selectedDistrict = districtOptions.selectedIndex !== -1 ? districtOptions.options[
                    districtOptions.selectedIndex].value : null;

                var industryId = $(this).find(":selected").val();
                var pageNumber = jQuery('#pagination-links .active a').text();
                fetch_customer_data(query, searchOption, pageNumber, selectedProvince, selectedDistrict);
            });



        });

        function fetch_customer_data(query = "", searchOption = "", pageNumber = 1, selectedProvince = "",
            selectedDistrict = "") {
            console.log("Search Option: " + searchOption);
            jQuery.ajax({
                url: "{{ route('home.action') }}",
                method: 'GET',
                data: {
                    query: query,
                    searchOption: searchOption,
                    page: pageNumber,
                    selectedProvince: selectedProvince,
                    selectedDistrict: selectedDistrict,
                },
                dataType: 'json',
                success: function(data) {
                    if (data.message) {
                        // Display the "No results found" message
                        jQuery('#test').html(data.message);
                        jQuery('#pagination-links').html("");
                    } else {
                        // Display the business data and pagination links
                        jQuery('#test').html(data.html);
                        jQuery('#pagination-links').html(data.pagination);
                    }
                    console.log(data);
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
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    alert(msg);
                }
            });
        }


        $(document).on('click', '#pagination-links a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                url: url,
                type: "get",
                datatype: "html",
                success: function(response) {
                    $('#test').html(response.html);
                    $('#pagination-links').html(response.pagination);

                    history.pushState(null, null, url);
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("search_description");
            const dropdown = document.getElementById("dropdown");

            // Show the dropdown when the input is clicked
            searchInput.addEventListener("click", function() {
                dropdown.classList.remove("hidden");
            });

            // Hide the dropdown when an item is selected
            dropdown.addEventListener("click", function(event) {
                if (event.target.classList.contains("dropdown-item")) {
                    dropdown.classList.add("hidden");
                    searchInput.value = event.target.textContent;
                }
            });

            // Hide the dropdown when clicking outside
            document.addEventListener("click", function(event) {
                if (!dropdown.contains(event.target) && event.target !== searchInput) {
                    dropdown.classList.add("hidden");
                }
            });
        });
        script >
            document.addEventListener("DOMContentLoaded", function() {
                const dropdown = document.getElementById("dropdown");
                const inputField = document.getElementById("search_description");
                const dropdownItems = dropdown.querySelectorAll(".dropdown-item");

                dropdownItems.forEach(item => {
                    item.addEventListener("click", function() {
                        const selectedItemText = item.textContent.trim();
                        inputField.value = selectedItemText === "mpumalanga" ? selectedItemText : "";
                    });
                });
            });
    </script>
