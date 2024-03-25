<x-app-layout title="">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    {{-- Display error message --}}
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @php
    $user_id = Auth::user()->id;
    @endphp
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-4">
            <div class="p-6 bg-white border-b border-gray-200">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('bdashboard') }}" class="ml-1 text-sm font-medium inline-flex">
                                <svg class="mr-2 w-4 h-4 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                {{ $urlSegments[0] == 'bdashboard' ? 'Dashboard' : ucfirst($urlSegments[0]) }}
                            </a>
                        </li>
                        @php
                        $url = '/';
                        @endphp
                        @foreach($urlSegments as $index => $segment)
                        @php
                        $url .= $segment . '/';
                        @endphp
                        @if($segment != 'bdashboard')
                        <li @if($loop->last) aria-current="page" @endif>
                            <a href="{{ $url }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                <svg class="mr-2 w-4 h-4 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                {{ ucfirst($segment) }}
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ol>
                </nav>

            </div>
        </div>

        @php
        $userid = Auth::user()->id;
        @endphp
        <div class="bg-white shadow-sm sm:rounded-lg gap-4">
            <div class="mb-4">

                @php
                // Array of slide names without the '.blade.php' extension
                $slides = [
                'business.registration_multi_form.slide1',
                'business.registration_multi_form.slide2',
                'business.registration_multi_form.slide3',
                'business.registration_multi_form.slide4',
                ];
                @endphp
                <x-businessregistration-multstep-form :slides="$slides" linking="{{ route('business.update') }}" :businessData="$businessData" />
            </div>
        </div>
    </div>

</x-app-layout>
<script>
    function previewImages(event) {
        const previewContainer = document.getElementById('preview-container');
        const files = event.target.files;
        for (const file of files) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('h-40', 'w-full', 'object-cover', 'rounded-md');

                // Create a container for each image with remove button
                const container = document.createElement('div');
                container.classList.add('relative');

                // Create remove button
                const removeBtn = document.createElement('button');
                removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                removeBtn.classList.add('absolute', 'top-2', 'right-2', 'px-2', 'py-1', 'bg-red-500', 'text-white', 'rounded');
                removeBtn.onclick = function() {
                    container.remove(); // Remove the container when remove button is clicked
                };

                // Append image and remove button to the container
                container.appendChild(img);
                container.appendChild(removeBtn);

                // Append container to the preview container
                previewContainer.appendChild(container);
            }
            reader.readAsDataURL(file);
        }
    }

    jQuery(document).ready(function() {
        var selectedprovinceId = $('#industryId').find(":selected").val();
        var name = $('#industryId').find(":selected").html();
        getCurrentIndustry(name);
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('change', '#industryId', function() {
            var query = jQuery(this).val();
            var industryId = $(this).find(":selected").val();
            var name = $(this).find(":selected").html();
            var regIndustryInput = document.getElementById("regindustryId");
            regIndustryInput.value = industryId;
            getCurrentIndustry(name);
        });
        jQuery(document).on('click', '.changeLogoBtn', function(e) {
            e.preventDefault();
            $("#logouploader").css("display", "block");
        });
        jQuery(document).on('change', '#provinceOptions', function() {
            var query = jQuery(this).val(),
                searchOption = "provinceSearch",
                viewType = "cardView";
            var provinceId = $(this).find(":selected").val();
            changeDistrict(provinceId);
            //changeTown(provinceId);
        });
        jQuery(document).on('change', '#districtOptions', function() {
            var query = jQuery(this).val(),
                searchOption = "industrySearch",
                viewType = "cardView";
            var provinceId = $(this).find(":selected").val();
            changeMunicipality(provinceId);
        });

    });

    function getCurrentIndustry(query) {
        document.getElementById("industryTitle").innerHTML = query;
        // Get the select element by its id
        var selectElement = document.getElementById("industryId");
        // Get the value of the selected option
        var selectedValue = selectElement.value;
        getIndustryServices(selectedValue);
    }

    function getIndustryServices(id) {
        // Assuming you have logic to retrieve services based on the selected industry id
        // Here, we'll just set the value of regindustryId to the selected id
        var regIndustryInput = document.getElementById("regindustryId");
        var selectedServices = document.getElementById("selectedServices");

        regIndustryInput.value = id;
        jQuery.ajax({
            url: "{{ route('business.registration.show') }}",
            method: 'GET',
            data: {
                id: id,
                selectedServices: selectedServices.value,
            },
            dataType: 'json',
            success: function(response) {
                // Append the HTML markup to the 'servicesreg' div
                $('#servicesreg').html(response.html);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
        console.log(regIndustryInput);
    }

    function changeDistrict($id) {
        jQuery.ajax({
            url: "{{ route('home.changeDistrict') }}",
            method: 'GET',
            data: {
                id: $id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);

                jQuery('#districtOptions')
                    .find('option')
                    .remove()
                    .end();
                data.forEach(district => {
                    console.log(district);
                    console.log(district.municipal_district);
                    console.log(district.id);
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

    function changeTown($id) {
        jQuery.ajax({
            url: "{{ route('home.changeTown') }}",
            method: 'GET',
            data: {
                id: $id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);

                jQuery('#townOptions')
                    .find('option')
                    .remove()
                    .end();
                data.forEach(town => {
                    console.log(town);
                    console.log(town.town);
                    console.log(town.id);
                    jQuery('#townOptions')
                        .append('<option value="' + town.id + '">' + town
                            .town +
                            '</option>');
                });
                $("#townOptions").val($("#townOptions option:first").val());
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
                    console.log(municipality);
                    console.log(municipality.municipality);
                    console.log(municipality.id);
                    jQuery('#municipalityOptions')
                        .append('<option value="' + municipality.id + '">' + municipality
                            .municipality +
                            '</option>');
                });
                $("#municipalityOptions").val($("#municipalityOptions option:first").val());

            }
        });



    }
</script>