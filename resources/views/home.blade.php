<x-app-layout title="Home">
    <div class="jumbotron homehead p-5 bg-primary d-flex align-items-center justify-content-center" style="height: 230px">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl">The Vine SA</h1>
            <p>Connecting you to your local businesses</p>
        </div>
    </div>
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
    <div class="bg-white">
        <div class="row">
            <div class="col py-10 text-center">
                <h1 class="text-xl md:text-xl font-bold">Welcome to the Vine SA</h1>
                <p class="block text-sm font-medium text-gray-700">The digital Business Directory helping you find
                    businesses around you</p>
            </div>
        </div>
        <div class="container py-3 md:px-10">
            <div class="row">
                <div class="bg-white my-3  rounded-lg">
                    <form id="searchForm">
                        <div class="grid grid-cols-5 gap-0">
                            <div class="col-span-2 flex items-center justify-center">
                                <input type="text" placeholder="Search Business" name="search"
                                    class="shadow-sm appearance-none border border-red-500 rounded-lg w-full py-2 text-gray-700 my-1 leading-tight focus:outline-none focus:shadow-outline"
                                    id="liveSearch">
                            </div>
                            <div class="col-span-1">
                                <select id="provinceOptions"
                                    class="shadow-sm appearance-none border border-red-500 rounded-lg w-full py-2 text-gray-700 my-1 leading-tight focus:outline-none focus:shadow-outline">
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
                            <div class="col-span-1">
                                <select id="districtOptions"
                                    class="shadow-sm appearance-none border border-red-500 rounded-lg w-full py-2 text-gray-700 my-1 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="" selected disabled>District</option>
                                </select>
                            </div>
                            <div class="col-span-1">
                                <select id="industryOptions"
                                    class="shadow-sm appearance-none border border-red-500 rounded-lg w-full py-2 text-gray-700 my-1 leading-tight focus:outline-none focus:shadow-outline">
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


    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container py-3 md:px-10">
        <div class="row flex justify-center">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 mt-2 mt-md-0 w-auto" id="test">
                @include('home._businesses', ['businesses' => $business])
            </div>
        </div>
        <div id="pagination-links">{{ $business->links() }}</div>
    </div>
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

        jQuery(document).on('change', '#municipalityOptions', function() {
            var query = $.trim($(this).find('option:selected').text());
            var searchOption = "municipalitySearch";
            var viewType = "cardView";
            var municipalityId = $(this).find(":selected").val();
            var pageNumber = jQuery('#pagination-links .active a').text(); // get current page number
            fetch_customer_data(query, searchOption, pageNumber);
        })
        jQuery(document).on('change', '#industryOptions', function() {
            var query = $.trim($(this).find('option:selected').text());
            var searchOption = "industrySearch";
            var viewType = "cardView";
            var provinceOptions = document.getElementById("provinceOptions");
            var selectedProvince = provinceOptions.selectedIndex !== -1 ? provinceOptions.options[
                provinceOptions.selectedIndex].text : null;

            var districtOptions = document.getElementById("districtOptions");
            var selectedDistrict = districtOptions.selectedIndex !== -1 ? districtOptions.options[
                districtOptions.selectedIndex].text : null;

            var industryId = $(this).find(":selected").val();
            var pageNumber = jQuery('#pagination-links .active a').text();
            fetch_customer_data(query, searchOption, pageNumber, selectedProvince, selectedDistrict);
        });
    });

    function fetch_customer_data(query = "", searchOption = "", pageNumber = 1, selectedProvince = "",
        selectedDistrict = "", selectedMunicipality = "") {
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
                selectedMunicipality: selectedMunicipality
            },
            dataType: 'json',
            success: function(data) {
                jQuery('#test').html(data.html);
                console.log(data);
                // Update pagination
                jQuery('#pagination-links').html(data.pagination);
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
            menthod: 'GET',
            data: {
                id: $id
            },
            dataType: 'json',
            success: function(data) {
                jQuery('#districtOptions')
                    .find('option')
                    .remove()
                    .end();
                data.forEach(district => {
                    jQuery('#districtOptions')
                        .append('<option onclick=" changeMunicipality(' + district.id +
                            ');" value="' +
                            district.id + '">' + district.municipal_district +
                            '</option>');
                });
                $("#districtOptions").val($("#districtOptions option:first").val());
                var selectedDistrict = $("#districtOptions").find(":selected").val();
                changeMunicipality(selectedDistrict);
            }
        });
    }

    function changeMunicipality($id) {
        jQuery.ajax({
            url: "{{ route('home.changeMunicipality') }}",
            menthod: 'GET',
            data: {
                id: $id
            },
            dataType: 'json',
            success: function(data) {
                jQuery('#municipalityOptions')
                    .find('option')
                    .remove()
                    .end();
                data.forEach(municipality => {
                    jQuery('#municipalityOptions')
                        .append('<option value="' + municipality.id + '">' +
                            municipality
                            .municipality +
                            '</option>');
                });
                $("#municipalityOptions").val($("#municipalityOptions option:first").val());
            }
        });
    }
</script>
