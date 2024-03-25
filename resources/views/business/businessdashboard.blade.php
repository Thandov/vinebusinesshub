<x-app-layout title="Business Dashbard">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Business Dashboard') }}
        </h2>
    </x-slot>
    <div class="md:grid md:grid-cols-1 h-full bg-green-400" id="dashboard_view">
        <!--  <div class="sidebar h-full bg-red-50">
            <div class="justify-between h-full">
                <div class="p-4">
                    <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-gray-900">
                        <svg class="w-[19px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8v10a1 1 0 0 0 1 1h4v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5h4a1 1 0 0 0 1-1V8M1 10l9-9 9 9" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </div>
                <div class="p-4">
                    <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-gray-900">
                        <svg class="w-[19px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                        </svg>
                        <span>Profile</span>
                    </a>
                </div>
                <div class="p-4">
                    <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-gray-900">
                        <svg class="w-[19px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1v14h16m0-9-3-2-3 5-3-2-3 4" />
                        </svg>
                        <span>Analytics</span>
                    </a>
                </div>
                <div class="p-4">
                    <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-gray-900">
                        <svg class="w-[19px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>
                        <span>Financials</span>
                    </a>
                </div>
                <div class="p-4">
                    <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-gray-900">
                        <svg class="w-[19px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 2-8.4 7.05a1 1 0 0 1-1.2 0L1 2m18 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1m18 0v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2" />
                        </svg>
                        <span>Messages</span>
                    </a>
                </div>
                <div class="p-4">
                    <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-gray-900">
                        <svg class="w-[19px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path
                                    d="M19 11V9a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L12 2.757V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L2.929 4.343a1 1 0 0 0 0 1.414l.536.536L2.757 8H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535L8 17.243V18a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H18a1 1 0 0 0 1-1Z" />
                                <path d="M10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </g>
                        </svg>
                        <span>Management</span>
                    </a>
                </div>
            </div>
        </div> -->
        <div class="grid grid-cols-6 contentwrapper h-full col-span-3">
            <!-- Power Tools -->
            <div class="col-span-2 mx-auto py-3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-start mb-4">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <i class="fas fa-cogs text-white"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Power Tools</h3>
                                    </dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">All the digital power in
                                                your hands</p>
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                            <div class="ml-auto">
                            </div>
                        </div>
                        <x-powerups-block-sidebar />
                    </div>
                </div>
            </div>
            <!-- Profile -->
            <div class="col-span-4 mx-auto py-3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-start mb-4">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <i class="fas fa-cogs text-white"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Profile</h3>
                                    </dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Profiling Your Business</p>
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                            <div class="ml-auto">
                            </div>
                        </div>
                        <div class="grid sm:grid-cols-5 gap-4">
                            <div class="col-span-1" id="pills-tab">
                                <div class="grid grid-flow-row gap-4 ">
                                    <div class="nav flex-column nav-pills me-3" id="pills-tab" role="tablist" aria-orientation="vertical">
                                        @include('business.viewbusiness.businesstabpanels.tabs')
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-4">
                                <div class="tab-content" id="v-pills-tabContent">
                                    @include('business.viewbusiness.businesstabpanels.businessinfo')
                                    @include('business.viewbusiness.businesstabpanels.mediapanel')
                                    @include('business.viewbusiness.businesstabpanels.locationpanel')
                                    @include('business.viewbusiness.businesstabpanels.industrypanel')
                                    @include('business.viewbusiness.businesstabpanels.userinfo')
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- <div class="modal fade" id="newIndustry" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newIndustryLabel" aria-hidden="true">
        <form class="ajax form-group" data-target="insertIndustry" id="insertIndustry" action="{{ route('business.businessdashboard.insertIndustry') }}" method="post">
@csrf
            <input type="hidden" name="approval_type" value="new industry">
            <input type="hidden" name="who_id" value="{{ auth()->user()->id }} ">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newIndustryLabel">Enter New Industry</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success d-none" id="success-message"></div>
                        <div class="alert alert-danger d-none" id="error-message"></div>
                        <input type="text" name="the_content" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="newbtn" type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div> -->
</x-app-layout>
<script>
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

    function readURL(input) {
        if (input.files && input.files) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#logo-preview').attr('src', '').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files);
            $('#logo-preview').show();
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

    function charcountupdate(str) {
        var lng = str.length;
        document.getElementById("charcount").innerHTML = '<span id="countNumber" class="text-green-700">' + lng +
            '</span>' + ' out of 1000 characters';
    }
    $(document).ready(function () {
        $("#change-logo-btn").click(function () {
            $('#logo-preview').attr('src', '').show();
            $("#file-upload").trigger("click");
        });

        $("input[type='file']").change(function () {
            readURL(this);
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
            success: function (data) {
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
            success: function (data) {
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
            success: function (data) {
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
            success: function (response) {
                // Append the HTML markup to the 'servicesreg' div
                $('#servicesreg').html(response.html);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
        console.log(regIndustryInput);
    }

    jQuery(document).ready(function () {
        var selectedprovinceId = $('#industryId').find(":selected").val();
        var name = $('#industryId').find(":selected").html();
        getCurrentIndustry(name);

        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('change', '#industryId', function () {
            var query = jQuery(this).val();
            var industryId = $(this).find(":selected").val();
            var name = $(this).find(":selected").html();
            var regIndustryInput = document.getElementById("regindustryId");
            regIndustryInput.value = industryId;
            getCurrentIndustry(name);
        });
        jQuery(document).on('click', '.changeLogoBtn', function (e) {
            e.preventDefault();
            $("#logouploader").css("display", "block");
        });
        jQuery(document).on('change', '#provinceOptions', function () {
            var query = jQuery(this).val(),
                searchOption = "provinceSearch",
                viewType = "cardView";
            var provinceId = $(this).find(":selected").val();
            changeDistrict(provinceId);
            //changeTown(provinceId);
        });
        jQuery(document).on('change', '#districtOptions', function () {
            var query = jQuery(this).val(),
                searchOption = "industrySearch",
                viewType = "cardView";
            var provinceId = $(this).find(":selected").val();
            changeMunicipality(provinceId);
        });

        $('#insertIndustry').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('#success-message').html(response.message)
                        .removeClass('d-none');
                    setTimeout(function () {
                        $('#newIndustry').modal('hide');
                    }, 2000);
                },
                error: function (xhr, status, error) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.message) {
                        $('#error-message').html(response.message)
                            .removeClass('d-none');
                        setTimeout(function () {
                            $('#error-message').addClass('d-none').html('');
                        }, 5000);
                    }
                }
            });
        });
        
        $('#newIndustry').on('hidden.bs.modal', function () {
            $('#success-message').addClass('d-none').html('');
            $('#error-message').addClass('d-none').html('');
        });
    });
</script>