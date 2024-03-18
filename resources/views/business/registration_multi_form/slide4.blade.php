<h1 class="text-3xl font-bold text-center text-gray-800 mb-12">INDUSTRY AND SERVICES</h1>
<div class="grid grid-cols-2 gap-6">
    <div class="md:col-span-1 col-span-2">
        <label for="industry" class="text-base font-semibold leading-7 text-gray-900">Industry</label>
        <select id="industryId" name="industryId" autocomplete="industry" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
            @if ($businessData['industries'] ?? '')
            @foreach ($businessData['industries']->sortBy('industry') as $industry)
            <option value="{{ $industry->id ?? '' }}">
                {{ $industry->industry }}
            </option>
            @endforeach
            @endif
        </select>
    </div>
    <div class="col-span-1">
        <div class="md:mt-0 md:col-span-8 md:col-start-3">

            <form class="ajax" action="/business/businessdashboard/insertclientservice" method="post">
                @csrf
                <input type="hidden" name="bid" value="">
                <input type="hidden" name="industryId" id="regindustryId" value="">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <fieldset class="md:grid md:grid-cols-12 md:gap-6">
                            <legend class="md:col-span-12 text-base font-medium text-gray-900">
                                <h3>Services</h3>
                            </legend>
                        </fieldset>
                        <div id="servicesreg"></div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Save
                        </button>
                    </div>
                </div>
                <div class="md:mt-8 md:col-span-2 grid grid-cols-3 gap-6">
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        getCurrentIndustry();
    });

    function getCurrentIndustry() {
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
        regIndustryInput.value = id;
        jQuery.ajax({
            url: "{{ route('business.registration.show') }}",
            method: 'GET',
            data: {
                id: id
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
</script>