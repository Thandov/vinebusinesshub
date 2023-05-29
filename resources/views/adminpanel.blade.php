<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-sm font-medium text-gray-900 active" id="business-tab"
                                data-bs-toggle="tab" data-bs-target="#business" type="button" role="tab"
                                aria-controls="business" aria-selected="true">Businesses</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-sm font-medium text-gray-900" id="profile-tab"
                                data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab"
                                aria-controls="profile" aria-selected="false">Industries</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-sm font-medium text-gray-900" id="services-tab"
                                data-bs-toggle="tab" data-bs-target="#services" type="button" role="tab"
                                aria-controls="services" aria-selected="false">Services</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-sm font-medium text-gray-900" id="provinces-tab"
                                data-bs-toggle="tab" data-bs-target="#provinces" type="button" role="tab"
                                aria-controls="provinces" aria-selected="false">Provinces</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-sm font-medium text-gray-900 " id="municipalities-tab"
                                data-bs-toggle="tab" data-bs-target="#municipalities" type="button" role="tab"
                                aria-controls="municipalities" aria-selected="false">Municipalities</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-sm font-medium text-gray-900" id="districts-tab"
                                data-bs-toggle="tab" data-bs-target="#districts" type="button" role="tab"
                                aria-controls="districts" aria-selected="false">Districts</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-sm font-medium text-gray-900" id="pendingApproval-tab"
                                data-bs-toggle="tab" data-bs-target="#pendingApproval" type="button" role="tab"
                                aria-controls="pendingApproval" aria-selected="false">PendingApprovals</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-sm font-medium text-gray-900" id="Approvals-tab"
                                data-bs-toggle="tab" data-bs-target="#Approvals" type="button" role="tab"
                                aria-controls="Approvals" aria-selected="false">Approvals</button>
                        </li>
                    </ul>
                    <!-- Tabs container -->
                    <div class="tab-content" id="myTabContent">
                        <!-- Tab for businesses -->
                        @include('_admin_panel_tabs._businesses')
                        <!-- Tab for Industries -->
                        @include('_admin_panel_tabs._industries')
                        <!-- Tab for services -->
                        @include('_admin_panel_tabs._services')
                        <!-- Tab for Province -->
                        @include('_admin_panel_tabs._provinces')
                        <!-- Tab for District -->
                        @include('_admin_panel_tabs._districts')
                        <!-- Tab for Municipalities -->
                        @include('_admin_panel_tabs._municipalities')
                        <!-- Tab for PendingApprovals -->
                        @include('_admin_panel_tabs._pending')
                        <!-- Tab for Approvals -->
                        @include('_admin_panel_tabs._approvals')
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

<script>

    jQuery(document).ready(function() {

        var count = 1;
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function submitService() {

        }

        function addRow(tableName) {
            count++;

            if (tableName === "get") {
                uploadName = "asasasa";
            }
            var tr = '<tr>' +
                '<td colspan="2" class="px-6 py-2 whitespace-nowrap">' +
                '<input type="text" name="service_name[]" value=""  autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">' +
                '</td>' +
                '<td class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium">' +
                '<button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 remove">Delete</button>' +
                '</td>' +
                '</tr>';
            jQuery('tbody#' + tableName).prepend(tr);

        }

        function deleteRow(tableName) {
            alert(tableName);
        }


        jQuery(document).on('click',
            '.addRow, .addRowIndustry, .addRowServices, .addRowProvince, .addRowDistricts, .addRowMunicipality, .addRowTown',
            function(e) {
                e.preventDefault();
                var tableName = jQuery(this).data('target');
                addRow(tableName);
            });

        jQuery('tbody').on('click', '.remove', function(e) {
            e.preventDefault();
            var tableName = jQuery(this).parent().data('target');
            jQuery(this).parent().parent().remove();
        });


        jQuery(document).on('click',
            '.activateBusinessBtn, .deleteProvinceBtn, .deactivateBusinessBtn, .deleteIndustryBtn, .deleteBusinessBtn, .deleteBtn',
            function(e) {
                e.preventDefault();
            });
    });

    function deleteProvince(id) {
        jQuery.ajax({
            url: "admin/adminpanel/deleteProvince/" + id,
            type: 'post',
            data: {
                _token: jQuery("input[name=_token").val(),
            },
            success: function(response) {

                console.log(response);
                jQuery("#prov" + id).remove();
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
                    msg = 'function deleteImage Requested JSON parse failed.';
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

    function deleteIndustry(id) {
        jQuery.ajax({
            url: "admin/adminpanel/deleteIndustry/" + id,
            type: 'post',
            data: {
                _token: jQuery("input[name=_token").val(),
            },
            success: function(response) {

                console.log(response);
                jQuery("#ind" + id).remove();
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
                    msg = 'function deleteImage Requested JSON parse failed.';
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

    function deleteMunicipality(id) {
        jQuery.ajax({
            url: "admin/adminpanel/destroy/" + id,
            type: 'get',
            data: {
                _token: jQuery("input[name=_token").val(),
            },
            success: function(response) {

                console.log(response);
                jQuery("#muni" + id).remove();
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
                    msg = 'function Requested JSON parse failed.';
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

    function deleteService(id) {
        jQuery.ajax({
            url: "admin/adminpanel/destroy/" + id,
            type: 'get',
            data: {
                _token: jQuery("input[name=_token").val(),
            },
            success: function(response) {

                console.log(response);
                jQuery("#serv" + id).remove();
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
                    msg = 'function Requested JSON parse failed.';
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

    function deleteBusiness(id) {
        jQuery.ajax({
            url: "adminpanel/deleteBusiness/" + id,
            type: 'get',
            data: {
                _token: jQuery("input[name=_token").val(),
            },
            success: function(response) {

                console.log(response);
                jQuery("#busi" + id).remove();
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
                    msg = 'function Requested JSON parse failed.';
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

    function activateBusiness(id) {
        jQuery.ajax({
            url: "adminpanel/activateBusiness/" + id,
            type: 'get',
            data: {
                _token: jQuery("input[name=_token").val(),
            },
            success: function(response) {
                jQuery('#test').load(" #businessTableWrapper");
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
                    msg = 'function Requested JSON parse failed.';
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

    function deactivateBusiness(id) {
        jQuery.ajax({
            url: "adminpanel/deactivateBusiness/" + id,
            type: 'get',
            data: {
                _token: jQuery("input[name=_token").val(),
            },
            success: function(response) {
                jQuery('#test').load(" #businessTableWrapper");
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
                    msg = 'function Requested JSON parse failed.';
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
    jQuery(document).on('change', '#provinceOptions', function() {
        var query = jQuery(this).val(),
            searchOption = "provinceSearch",
            viewType = "cardView";
        fetch_customer_data(query, searchOption, viewType);
        var provinceId = $(this).find(":selected").val();

        changeDistrict(provinceId);
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
                var selectedDistrict = $(this).find(":selected").val();
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
                console.log(data);
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