<x-app-layout title="Home">
    <div class="jumbotron homehead p-5 bg-primary d-flex align-items-center justify-content-center" style="height: 230px">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl">The Vine SA</h1>
            <p>Connecting you to your local businesses</p>
        </div>
    </div>
    <div class="container-fluid mb-5 bg-white">
        <div class="row">
            <div class="col py-12 text-center">
                <h1 class="text-xl md:text-xl font-bold">Welcome to the Vine SA</h1>
                <p class="block text-sm font-medium text-gray-700">The digital Business Directory helping you find
                    businesses around you</p>
            </div>
        </div>
    </div>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="md:grid md:grid-cols-6 gap-4">
        <form id="searchForm" class="md:col-span-2 md:col-start-2">
            <div class="container bg-white shadow-sm py-12 rounded-md">
                <div class="row">
                    <div class="col-12">
                        <h4 class="pb-2 font-bold">Search criteria:</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="business_name" class="block text-sm font-medium text-gray-700">Business Name
                        </label>
                        <input type="text" placeholder="Enter your Search" name="search" class="shadow-sm appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="liveSearch">
                    </div>
                    <div class="col-12">
                        <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                        <select id="provinceOptions" class="shadow-sm appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                            {{ $provinces ?? '' }} @if($provinces ?? '' ) @foreach($provinces ?? '' as $province)
                            <option value="{{ $province->id }}" data-name="{{ $province->province }}">
                                {{ $province->province }}
                            </option>
                            @endforeach @endif
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="district" class="block text-sm font-medium text-gray-700">District</label>
                        <select id="districtOptions" class="shadow-sm appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">

                        </select>
                    </div>
                    <div class="col-12">
                        <label for="municipality" class="block text-sm font-medium text-gray-700">Municipality</label>
                        <select id="municipalityOptions" class="shadow-sm appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                            {{ $municipalities ?? '' }} @if($municipalities ?? '' ) @foreach($municipalities ?? ''
                            as $municipality)
                            <option>{{ $municipality->municipality }}</option>
                            @endforeach @endif
                        </select>
                    </div>
                    <!--  <div class="col-12">
                            <label for="town" class="block text-sm font-medium text-gray-700">Town</label>
                            <select id="townOptions"
                                class="shadow-sm appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"></select>
                        </div> -->
                    <div class="col-12">
                        <label for="Industry" class="block text-sm font-medium text-gray-700">Industry</label>
                        <select id="industryOptions" class="shadow-sm appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">

                            @if($industry ?? '' ) @foreach($industry as $indust)
                            <option value="{{ $indust->industry }}">{{ $indust->industry }}</option>
                            @endforeach @endif
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="md:col-span-2">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mt-5 mt-md-0" id="test">
                @include('home._businesses', ['businesses' => $business])
            </div>
            <div id="pagination-links">{{$business->links()}}</div>
        </div>
    </div>
</x-app-layout>

<script>
jQuery(document).ready(function() {

    $(document).on('click', '#pagination-links a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type: "get",
            datatype: "html",
            success: function(response) {
                $('#test').html(response.html);
                history.pushState(null, null, url);
            }
        });
    });
    var selectedprovinceId = $(this).find(":selected").val();
    changeDistrict(selectedprovinceId);

    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function fetch_customer_data(query = "", searchOption = "", pageNumber = 1) {
        console.log(searchOption);
        jQuery.ajax({
            url: "{{ route('home.action') }}",
            method: 'GET',
            data: {
                query: query,
                searchOption: searchOption,
                page: pageNumber
            },
            dataType: 'json',
            success: function(data) {
                jQuery('#test').html(data.html);
                console.log(data);
                // Update pagination
                jQuery('#pagination-links').html(data.pagination);
            },
            error: function(jqXHR, exception) {
                // Error handling code here
            }
        });
    }


    jQuery(document).on('keyup', '#liveSearch', function() {
        var query = jQuery(this).val(),
            searchOption = "businessNameSearch",
            pageNumber = jQuery('#pagination-links .active a').text(); // get current page number
        fetch_customer_data(query, searchOption, pageNumber);
    });;

    jQuery(document).on('change', '#provinceOptions', function() {

        //alert($.trim($(this).find('option:selected').text()));

        var query = $.trim($(this).find('option:selected').text()),
            searchOption = "provinceSearch",
            viewType = "cardView";
        fetch_customer_data(query, searchOption, viewType);
        var provinceId = $(this).find(":selected").val();

        changeDistrict(provinceId);
    });
    jQuery(document).on('change', '#districtOptions', function() {
        var query = jQuery(this).val(),
            searchOption = "industrySearch",
            viewType = "cardView";
        fetch_customer_data(query, searchOption, viewType);
        var provinceId = $(this).find(":selected").val();
        changeMunicipality(provinceId);
    });
    jQuery(document).on('change', '#industryOptions', function() {
        var query = jQuery(this).val(),
            searchOption = "industrySearch",
            viewType = "cardView";
        fetch_customer_data(query, searchOption, viewType);
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
                    .append('<option value="' + municipality.id + '">' + municipality.municipality +
                        '</option>');
            });
            $("#municipalityOptions").val($("#municipalityOptions option:first").val());
        }
    });
}
</script>