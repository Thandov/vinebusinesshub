<x-app-layout title="Home">
    <div class="jumbotron homehead p-5 bg-primary d-flex align-items-center justify-content-center"
        style="height: 230px">
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
    <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="row">
            <form class="col-md-3">
                <div class="container bg-white shadow-sm py-12 rounded-md">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="pb-2 font-bold">Search criteria:</h4>
                        </div>
                    </div>
                    <div class="row">
                       <div class="accordion" id="myAccordion">
                    <div class="col-12">
                      <label for="business_name" class="block text-sm font-medium text-gray-700">Business Name
                      </label>
                      <input type="text" placeholder="Enter your Search" name="search" class="shadow-sm appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="liveSearch">
                  </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#provinces" aria-expanded="false" aria-controls="provinces">
                          Provinces
                        </button>
                      </h2>
                      <div id="provinces" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#myAccordion">
                        <div class="accordion-body h-48 overflow-y-scroll overflow-x-hidden">
                          @if($provinces ?? '')
                          @foreach($provinces ?? '' as $province)
                            <div class="province-item">
                              <label class="inline-flex items-center">
                                <input type="checkbox" name="province[]" value="{{ $province->id }}" data-name="{{ $province->province }}" class="form-checkbox h-5 w-5 text-red-600">
                                <span class="ml-2">{{ $province->province }}</span>
                              </label>
                            </div>
                          @endforeach
                        @endif                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#districts" aria-expanded="false" aria-controls="districts">
                          Districts
                        </button>
                      </h2>
                      <div id="districts" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#myAccordion">
                        <div class="accordion-body h-48 overflow-y-scroll overflow-x-hidden">
                          @if($municipal_districts ?? '')
                          @foreach($municipal_districts ?? '' as $district)
                            <div class="district-item">
                              <label class="inline-flex items-center">
                                <input type="checkbox" name="district[]" value="{{ $district->id }}" data-name="{{ $district->municipal_district }}" class="form-checkbox h-5 w-5 text-red-600">
                                <span class="ml-2">{{ $district->municipal_district }}</span>
                              </label>
                            </div>
                          @endforeach
                        @endif
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#municipality" aria-expanded="false" aria-controls="municipality">
                          Municipality
                        </button>
                      </h2>
                      <div id="municipality" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#myAccordion">
                        <div class="accordion-body h-48 overflow-y-scroll overflow-x-hidden">
                          @if($municipalities ?? '')
                          @foreach($municipalities ?? '' as $municipality)
                            <div class="municipality-item">
                              <label class="inline-flex items-center">
                                <input type="checkbox" name="municipality[]" value="{{ $municipality->id }}" data-name="{{ $municipality->municipality }}" class="form-checkbox h-5 w-5 text-red-600">
                                <span class="ml-2">{{ $municipality->municipality }}</span>
                              </label>
                            </div>
                          @endforeach
                        @endif
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#industry" aria-expanded="false" aria-controls="industry">
                          Industry
                        </button>
                      </h2>
                      <div id="industry" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#myAccordion">
                        <div class="accordion-body h-48 overflow-y-scroll overflow-x-hidden">
                          @if($industry ?? '')
                          @foreach($industry ?? '' as $indust)
                            <div class="indust-item">
                              <label class="inline-flex items-center">
                                <input type="checkbox" name="industry[]" value="{{ $indust->industry }}" data-name="{{ $indust->industry }}" class="form-checkbox h-5 w-5 text-red-600">
                                <span class="ml-2">{{ $indust->industry }}</span>
                              </label>
                            </div>
                          @endforeach
                        @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  
                    <div class="col-12">
                        <button type="submit" class="w-full inline-flex justify-center mt-2 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Submit</button>
                    </div>
                </div>
            </div>
            </form>
            <div class="col-md-9">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-5 mt-md-0" id="test">
                    @include('home._businesses', ['business' => $business])
            </div>
            <div id="pagination-links">{{$business->links()}}</div>
    </div>
                </div>
</x-app-layout>
<script>
jQuery(document).ready(function() {

    $(document).on('click', '.pagination-links a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type: "get",
            dataType: "html",
            success: function(response) {
                $('#test').html(response);
                history.pushState(null, null, url);
            }
        });
    });
    var selectedprovinceId = $(this).find(":selected").val();
    changeDistrict(selectedprovinceId);
    //Resert the Industry option to its Default Value 
    jQuery("#liveSearch, #provinceOptions, #districtOptions, #municipalityOptions").on("change", function() {
        jQuery("#industryOptions").val("");
    });

    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function fetch_customer_data(query = "",searchOption = "",viewType = "",pageNumber = 1) {
        console.log(searchOption);
        jQuery.ajax({
            url: "{{ route('home.action') }}",
            method: 'GET',
            data: {
                query: query,
                searchOption: searchOption,
                viewType: viewType,
                page: pageNumber
            },
            dataType: 'json',
            success: function(data) {
                jQuery('#test').html(data.html);
                console.log(data);
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

    }); 
    jQuery(document).on('change', 'input[name="province[]"]', function() {
        var query = $.trim($(this).find('option:selected').text()),
            searchOption = "provinceSearch",
            viewType = "cardView";
            fetch_customer_data(query, searchOption, viewType);
        var provinceId = $(this).find(":selected").val();

        changeDistrict(provinceId);
    });

    jQuery(document).on('change', 'input[name="district[]"]', function() {
        var query = jQuery(this).val(),
            searchOption = "industrySearch",
            viewType = "cardView";
        fetch_customer_data(query, searchOption, viewType);
       // var provinceId = $(this).find(":selected").val();
        changeMunicipality(provinceId);
    });

    jQuery(document).on('change', 'input[name="industry[]"]', function() {
        var query = jQuery(this).val(),
            searchOption = "industrySearch",
            viewType = "cardView",
            pageNumber = 1;
        fetch_customer_data(query, searchOption, viewType,pageNumber);
    });
    jQuery(document).on('change', 'input[name="municipality[]"]', function() {
        //var query = $.trim($(this).find('option:selected').text()),
            searchOption = "municipalitySearch",
            viewType = "cardView";
            var municipalityId = $(this).find(":selected").val();

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
        method: 'GET',
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
            var selectedMunicipality = $("#municipalityOptions").find(":selected").val();
        }
    });
}
</script>
