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
                'business.registration_multi_form.slide2',
                'business.registration_multi_form.slide2',
                'business.registration_multi_form.slide3',
                ];
                @endphp
                <x-businessregistration-multstep-form :slides="$slides" linking="{{ route('business.update') }}" :businessData="$businessData" />
            </div>
        </div>
        <x-powerupslist />
    </div>
</x-app-layout>

<script>
    function readURL(input) {
        if (input.files && input.files) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#logo-preview').attr('src', '').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files);
            $('#logo-preview').show();
        }

    }
    $(document).ready(function() {
        $("#change-logo-btn").click(function() {
            $('#logo-preview').attr('src', '').show();
            $("#file-upload").trigger("click");
        });

        $("input[type='file']").change(function() {
            readURL(this);
        });

    });

    jQuery(document).ready(function() {
        var selectedprovinceId = $(this).find(":selected").val();

        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('change', '#industryId', function(e) {
            e.preventDefault();

            var otherOption = $(this).find(":selected").val();
            if (otherOption === "1") {
                console.log("Other option selected");
                $('#newIndustry').modal('show');
            }
        });


        $(function() {
            $('#insertIndustry').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#success-message').html(response.message)
                            .removeClass(
                                'd-none');
                        setTimeout(function() {
                            $('#newIndustry').modal('hide');
                        }, 2000);
                    },
                    error: function(xhr, status, error) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.message) {
                            $('#error-message').html(response.message)
                                .removeClass(
                                    'd-none');
                            setTimeout(function() {
                                $('#error-message').addClass(
                                    'd-none').html(
                                    '');
                            }, 5000);
                        }
                    }
                });
            });
            $('#newIndustry').on('hidden.bs.modal', function() {
                $('#success-message').addClass('d-none').html('');
                $('#error-message').addClass('d-none').html('');
            });
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
            changeTown(provinceId);
        });
        jQuery(document).on('change', '#districtOptions', function() {
            var query = jQuery(this).val(),
                searchOption = "industrySearch",
                viewType = "cardView";
            var provinceId = $(this).find(":selected").val();
            changeMunicipality(provinceId);
        });

    });

    function confirmDelete(id) {
        document.getElementById("deleteConfirmation").classList.remove("hidden");
    }

    function cancelDelete() {
        document.getElementById("deleteConfirmation").classList.add("hidden");
    }

    function approveDelete(id) {
        // Display a confirmation dialog
        if (confirm(
                "This will delete your user profile and your business profile. Are you sure you want to proceed?")) {
            // Perform the deletion operation using the provided id
            window.location.href = "deleteBusinessandUser/" + id;
        }
    }
    //bio script
    function charcountupdate(value) {
        const maxLength = 1000;
        const charCount = value.length;
        const charCountElement = document.getElementById('charcount');
        charCountElement.textContent = `${charCount} / ${maxLength}`;

        // Disable further typing if the limit is reached
        if (charCount >= maxLength) {
            document.getElementById('business_bio').setAttribute('readonly', 'readonly');
        } else {
            document.getElementById('business_bio').removeAttribute('readonly');
        }
    }

    function changeDistrict($id) {
        jQuery.ajax({
            url: "{{ route('home.changeDistrict') }}",
            menthod: 'GET',
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
            menthod: 'GET',
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

    function charcountupdate(str) {
        var lng = str.length;
        document.getElementById("charcount").innerHTML = '<span id="countNumber" class="text-green-700">' + lng +
            '</span>' + ' out of 1000 characters';
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