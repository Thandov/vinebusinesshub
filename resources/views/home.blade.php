<x-app-layout title="Home">
    <!--Carousel-->
    <section id="carousel">
        @include('_carousel')
    </section>

    @if ($message = session('success'))
        <div id="success-message" class="alert alert-success">
            {{ $message }}
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $('#success-message').fadeOut('slow');
                }, 1000);
            });
        </script>
    @endif


    <div class="bg-white py-4">

        <div class="container py-3 md:px-10">
            <div class="row">
                <div class="bg-white my-3  rounded-lg">
                    <form id="searchForm">
                        <div class="grid grid-cols-5 mx-0">
                            <div class="col-span-2 flex items-center justify-center">
                                <input type="text" placeholder="Search Business" name="search"
                                    class="shadow-sm appearance-none border border-red-500 rounded-l-full w-full py-2 text-gray-700 my-1 leading-tight focus:outline-none focus:shadow-outline"
                                    id="liveSearch">
                            </div>
                            <div class="col-span-1">
                                <select id="provinceOptions"
                                    class="shadow-sm appearance-none border border-red-500  w-full py-2 text-gray-700 my-1 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="" selected disabled>Province</option>
                                    {{ $provinces ?? '' }} @if ($provinces ?? '')
                                        @foreach ($provinces ?? '' as $province)
                                            <option value="{{ $province->id }}" data-name="{{ $province->province }}">
                                                {{ $province->province }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <select id="districtOptions"
                                class="shadow-sm appearance-none border border-red-500  w-full py-2 text-gray-700 my-1 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="" selected disabled>District</option>
                                @if ($districts ?? '')
                                    @foreach ($districts ?? '' as $district)
                                        <option value="{{ $district->id }}"
                                            data-name="{{ $district->municipal_district }}">
                                            {{ $district->municipal_district }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>

                            <div class="col-span-1">
                                <select id="industryOptions"
                                    class="shadow-sm appearance-none border border-red-500 rounded-r-full w-full py-2 text-gray-700 my-1 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="" selected disabled>Industry</option>
                                    @if ($industry ?? '')
                                        @foreach ($industry as $indust)
                                            <option value="{{ $indust->industry }}">{{ $indust->industry }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if ($business->isEmpty())
            <p>No results found.</p>
        @else
            <div class="container py-3 md:px-10">
                <div class="grid grid-cols-2 py-4 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-2 mt-md-0 w-auto"
                    id="test">
                    @include('home._businesses', ['businesses' => $business])
                </div>
                <div id="pagination-links">{{ $business->links() }}</div>
            </div>
        @endif
</x-app-layout>

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

        jQuery(document).on('keyup', '#liveSearch', function() {
            var query = jQuery(this).val();
            var searchOption = "businessNameSearch";
            var pageNumber = jQuery('#pagination-links .active a').text(); // get current page number
            fetch_customer_data(query, searchOption, pageNumber);
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

        jQuery(document).on('change', '#districtOptions', function() {
            var query = $.trim($(this).find('option:selected').text());
            var searchOption = "districtSearch";
            var viewType = "cardView";
            var provinceId = $(this).find(":selected").val();
            changeMunicipality(provinceId);
            var pageNumber = jQuery('#pagination-links .active a').text(); // get current page number
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

        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                dots: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    }
                },
                autoplay: true,
                autoplayTimeout: 12000,
                autoplayHoverPause: false,
            });

            // Add hover effect using mouseover and mouseout events
            $('.owl-carousel .owl-item').on('mouseover', function() {
                $(this).css('background-color', 'grey');
            }).on('mouseout', function() {
                $(this).css('background-color', ''); // Reset to default background
            });
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

    function changeDistrict($id) {
        jQuery.ajax({
            url: "{{ route('home.changeDistrict') }}",
            method: 'GET',
            data: {
                id: $id
            },
            dataType: 'json',
            success: function(data) {
                var districtOptions = jQuery(
                    '#districtOptions'); // Declare the districtOptions variable here

                districtOptions.find('option').remove().end();
                districtOptions.append('<option value="" selected disabled>District</option>');

                data.forEach(district => {
                    districtOptions.append('<option onclick="changeMunicipality(' + district.id +
                        ');" value="' +
                        district.id + '">' + district.municipal_district +
                        '</option>');
                });

                districtOptions.val(districtOptions.find('option:first').val());

                var selectedDistrict = districtOptions.find(":selected").val();
                changeMunicipality(selectedDistrict);
            }
        });
    }
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
    });
</script>
<script>
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
