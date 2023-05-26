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

                        <li onclick="setActiveTab('business-tab')" class="nav-item" role="presentation">
                            <button class="nav-link text-sm font-medium text-gray-900 active" id="business-tab" data-bs-toggle="tab" data-bs-target="#business" type="button" role="tab" aria-controls="business" aria-selected="true">Businesses</button>
                        </li>

                        <li onclick="setActiveTab('business-tab')" class="nav-item" role="presentation">
                            <button class="nav-link text-sm font-medium text-gray-900" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Industries</button>
                        </li>
                        <li onclick="setActiveTab('business-tab')" class="nav-item" role="presentation">
                            <button class="nav-link text-sm font-medium text-gray-900" id="services-tab" data-bs-toggle="tab" data-bs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false">Services</button>
                        </li>
                        <li onclick="setActiveTab('business-tab')" class="nav-item" role="presentation">
                            <button class="nav-link text-sm font-medium text-gray-900" id="provinces-tab" data-bs-toggle="tab" data-bs-target="#provinces" type="button" role="tab" aria-controls="provinces" aria-selected="false">Provinces</button>
                        </li>
                        <li onclick="setActiveTab('business-tab')" class="nav-item" role="presentation">
                            <button class="nav-link text-sm font-medium text-gray-900 " id="municipalities-tab" data-bs-toggle="tab" data-bs-target="#municipalities" type="button" role="tab" aria-controls="municipalities" aria-selected="false">Municipalities</button>
                        </li>
                        <li onclick="setActiveTab('business-tab')" class="nav-item" role="presentation">
                            <button class="nav-link text-sm font-medium text-gray-900" id="districts-tab" data-bs-toggle="tab" data-bs-target="#districts" type="button" role="tab" aria-controls="districts" aria-selected="false">Districts</button>
                        </li>

                        <li onclick="setActiveTab('business-tab')" class="nav-item" role="presentation">
                            <button class="nav-link text-sm font-medium text-gray-900" id="" data-bs-toggle="tab" data-bs-target="#approvals" type="button" role="tab" aria-controls="approvals" aria-selected="false">Pending Approvals</button>
                        </li>

                    </ul>
                    <!-- Tabs container -->
                    <div class="tab-content" id="myTabContent">
                        <!-- Tab for businesses -->
                        <div class="tab-pane fade" id="business" role="tabpanel" aria-labelledby="home-tab">
                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class="flex flex-col">
                                <div class="my-2 pb-5 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg" id="test">
                                            <table class="min-w-full divide-y divide-gray-200" id="businessTableWrapper">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Name
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Province
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Status
                                                        </th>
                                                        <th scope="col" class="relative px-6 py-3">
                                                            <span class="sr-only">Edit</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200" id="admintableadminbusinesses">
                                                    @foreach ($adminbusinesses as $business)
                                                    <tr id="busi{{ $business->id }}">
                                                        <td class="px-2 py-2 whitespace-nowrap">
                                                            <div class="flex items-center">

                                                                <div class="ml-4">
                                                                    <div class="text-sm font-medium text-gray-900">
                                                                        {{ $business->business_name }}
                                                                    </div>
                                                                    <div class="text-sm text-gray-500">
                                                                        {{ $business->email }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-2 py-2 whitespace-nowrap">
                                                            <div class="text-sm text-gray-900">{{ $business->province }}
                                                            </div>
                                                        </td>
                                                        <td class="px-2 py-2 whitespace-nowrap">
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full @if($business->activation_status == 1) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                                                                @if($business->activation_status == 0) Not Activated
                                                                @else Activated @endif
                                                            </span>
                                                        </td>
                                                        <td class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium">
                                                            @if($business->activation_status == 0)
                                                            <a href="adminpanel/activateBusiness/{{$business->id}}" class="activateBusinessBtn inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" id="{{$business->id}}" onclick="activateBusiness('{{$business->id}}');">Activate</a>


                                                            @else

                                                            <a href="/viewBusiness/{{ $business->id }}" class="viewBusinessBtn inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" id="{{$business->id}}" onclick="viewBusiness('{{$business->id}}');">View</a>

                                                            <a href="adminpanel/deactivateBusiness/{{$business->id}}" class="deactivateBusinessBtn inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" id="{{$business->id}}" onclick="deactivateBusiness('{{$business->id}}');">Deactivate</a>
                                                            @endif

                                                            <a href="adminpanel/deleteBusiness/{{$business->id}}" class="deleteBusinessBtn inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" id="{{$business->id}}" onclick="deleteBusiness('{{$business->id}}');">Delete</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tab for Industries -->
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            @if($adminindustries ?? '' )
                            <form class="ajax" data-target="insertIndustry" id="insertIndustry" action="admin/adminpanel/insertIndustry" method="post">
                                @csrf
                                <input type="hidden" class="serviceId" name="id" value="abc">
                                <div class="flex flex-col">
                                    <div class="my-2 pb-5 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                <table class="min-w-full divide-y divide-gray-200">
                                                    <thead class="bg-gray-50">
                                                        <tr>
                                                            <th colspan="2" class="px-6 py-0 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Name
                                                            </th>
                                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">
                                                                <div class="addRowIndustry inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" data-target="industriesTable">Add</div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-200" id="industriesTable">
                                                        @foreach($adminindustries as $indust)
                                                        <tr id="ind{{$indust->id}}">
                                                            <td colspan="2" class="px-6 py-1 whitespace-nowrap">
                                                                <p class="text-sm font-medium text-gray-900">{{$indust->industry}}</p>
                                                            </td>
                                                            <td class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium" data-target="industriesTable">
                                                                <a href="/adminpanel/deleteIndustry/{{$indust->id}}" onclick="deleteIndustry('{{$indust->id}}')" class="deleteIndustryBtn inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" id="{{$indust->id}}">Delete</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        <!-- More people... -->
                                                    </tbody>
                                                    <tfoot class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                                        <tr>
                                                            <td colspan="2"><div id="-links">{{ $adminindustries->links() }}</div></td>
                                                            <td class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium">
                                                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                    Save
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endif
                            
                        </div>
                        <!-- Tab for services -->
                        <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
                            <div class="container-fluid my-5" id="serviceswrap">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <ul class="nav nav-pills sidepills">
                                            @if($adminindustries ) @foreach($adminindustries as $industry) @php
                                            $tablename = $name = str_replace(' ', '_', strtolower($industry->industry));
                                            @endphp
                                            <li class="nav-item">
                                                <a class="nav-link text-sm font-medium text-gray-900" id="@php echo $name @endphp-tab" data-bs-toggle="tab" data-bs-target="#@php echo $name @endphp" type="button" role="tab" aria-controls="@php echo $name @endphp" aria-selected="false">
                                                    @php echo $industry->industry; @endphp
                                                </a>
                                            </li>
                                            @endforeach @endif
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-md-9">
                                        <div class="tab-content">
                                            @if($adminindustries ) @foreach($adminindustries as $industry) @php
                                            $tablename = $name = str_replace(' ', '_', strtolower($industry->industry));
                                            @endphp
                                            <div class="tab-pane fade" id="@php echo $name; @endphp" role="tabpanel" aria-labelledby="contact-tab">
                                                <!-- This example requires Tailwind CSS v2.0+ -->
                                                <form class="ajax" id="servicesForm" data-target="insertService" id="insertService" action="/admin/adminpanel/insertService" method="post">
                                                    @csrf
                                                    <span id="result"></span>

                                                    <input type="hidden" name="id" class="serviceId" value="{{$industry->id}}">
                                                    <div class="flex flex-col">
                                                        <div class="my-2 pb-5 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                                                <h1 class="text-2xl font-medium text-gray-900">@php echo $industry->industry; @endphp</h1>
                                                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                                    <table class="min-w-full divide-y divide-gray-200">
                                                                        <thead class="bg-gray-50">
                                                                            <tr>
                                                                                <th colspan="2" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                                    Name
                                                                                </th>
                                                                                <th scope="col" class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium">
                                                                                    <div class="addRowServices inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" data-target="@php echo $tablename; @endphpTable">
                                                                                        Add</div>
                                                                                </th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="bg-white divide-y divide-gray-200" id="@php echo $tablename; @endphpTable">
                                                                            @if($adminservices ?? '') @for($i=0; $i
                                                                            < count($adminservices); $i++) @if($adminservices[$i]->industryId ===
                                                                                $industry->id)
                                                                                <tr id="serv{{$adminservices[$i]->id}}">
                                                                                    <td colspan="2" class="px-6 py-2 whitespace-nowrap">
                                                                                        <input disabled type="text" name="name_service" value="@php echo $adminservices[$i]->service_name; @endphp " autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                                    </td>
                                                                                    <td class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium" data-target="@php echo $tablename; @endphp">
                                                                                        <a href="/admin/adminpanel/destroy/{{$adminservices[$i]->id}}" class="deleteBtn inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" id="{{$adminservices[$i]->id}}" onclick="deleteService('{{$adminservices[$i]->id}}');">Delete</a>
                                                                                    </td>
                                                                                </tr>
                                                                                @endif @endfor @endif


                                                                                <!-- More people... -->
                                                                        </tbody>
                                                                        <tfoot class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                                                            <tr>
                                                                                <td colspan="2"></td>
                                                                                <td class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium">
                                                                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                                        Save
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                            @endforeach @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tab for Province -->
                        <div class="tab-pane fade" id="provinces" role="tabpanel" aria-labelledby="provinces-tab">
                            @if($adminprovinces ?? '' )
                            <form class="ajax" data-target="insertProvince" id="insertProvince" action="admin/adminpanel/insertProvince" method="post">
                                @csrf
                                <input type="hidden" class="serviceId" name="id" value="1">
                                <div class="flex flex-col">
                                    <div class="my-2 pb-5 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                <table class="min-w-full divide-y divide-gray-200">
                                                    <thead class="bg-gray-50">

                                                        <tr>
                                                            <th colspan="2" class="px-6 py-0 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Name
                                                            </th>
                                                            <th class="px-6 py-3 text-xs font-medium text-gray-500 tracking-wider text-right">
                                                                <div class="addRowProvince inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" data-target="provinceTable">Add</div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-200" id="provinceTable">
                                                        @foreach($adminprovinces as $province)
                                                        <tr id="prov{{$province->id}}">
                                                            <td colspan="2" class="px-6 py-1 whitespace-nowrap">
                                                                <p class="text-sm font-medium text-gray-900">{{$province->province}}</p>
                                                            </td>
                                                            <td class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium" data-target="provinceTable">
                                                                <a href="/adminpanel/deleteProvince/{{$province->id}}" onclick="deleteProvince('{{$province->id}}')" class="deleteProvinceBtn inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" id="{{$province->id}}">Delete</a>
                                                            </td>
                                                        </tr>

                                                        @endforeach


                                                        <!-- More people... -->
                                                    </tbody>
                                                    <tfoot class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium">
                                                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                    Save
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            @endif


                        </div>
                        <!-- Tab for District -->
                        <div class="tab-pane fade" id="districts" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="container-fluid mt-5">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 mb-5">
                                        <ul class="nav nav-pills sidepills">
                                            @if($adminprovinces ) @foreach($adminprovinces as $province) @php $tablename
                                            = $name = str_replace(' ', '_', strtolower($province->province));
                                            @endphp
                                            <li class="nav-item">
                                                <a class="nav-link text-sm font-medium text-gray-900" id="@php echo $name @endphp-tab" data-bs-toggle="tab" data-bs-target="#@php echo $name @endphp" type="button" role="tab" aria-controls="@php echo $name @endphp" aria-selected="false">
                                                    @php echo $province->province; @endphp
                                                </a>
                                            </li>
                                            @endforeach @endif
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-md-9">
                                        <div class="tab-content">
                                            @if($adminprovinces ) @foreach($adminprovinces as $province) @php $tablename
                                            = $name = str_replace(' ', '_', strtolower($province->province));
                                            @endphp
                                            <div class="tab-pane fade" id="@php echo $name; @endphp" role="tabpanel" aria-labelledby="contact-tab">
                                                <!-- This example requires Tailwind CSS v2.0+ -->
                                                <form class="ajax" data-target="insertDistrict" id="insertDistrict" action="/admin/adminpanel/insertDistrict" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$province->id}}">
                                                    <div class="flex flex-col">
                                                        <div class="my-2 pb-5 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                                    <table class="min-w-full divide-y divide-gray-200">
                                                                        <thead class="bg-gray-50">
                                                                            <tr>
                                                                                <th colspan="2" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                                    Name
                                                                                </th>
                                                                                <th scope="col" class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium">
                                                                                    <div class="addRowDistricts inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" data-target="@php echo $tablename; @endphpTable">
                                                                                        Add</div>
                                                                                </th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="bg-white divide-y divide-gray-200" id="@php echo $tablename; @endphpTable">
                                                                            @if($admindistricts ?? '') @for($i=0; $i
                                                                            < count($admindistricts); $i++) @if($admindistricts[$i]->provinceId ===
                                                                                $province->id)
                                                                                <tr id="dist{{$admindistricts[$i]->id}}">
                                                                                    <td colspan="2" class="px-6 py-2 whitespace-nowrap">
                                                                                        <input disabled type="text" name="name_service" value="@php echo $admindistricts[$i]->municipal_district; @endphp " autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                                    </td>
                                                                                    <td class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium" data-target="@php echo $tablename; @endphp">
                                                                                        <a href="/admin/adminpanel/deleteMuni/destroy/{{$admindistricts[$i]->id}}" class="deleteBtn inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" id="{{$admindistricts[$i]->id}}" onclick="deleteMunicipality('{{$admindistricts[$i]->id}}');">Delete</a>
                                                                                    </td>
                                                                                </tr>
                                                                                @endif @endfor @endif


                                                                                <!-- More people... -->
                                                                        </tbody>
                                                                        <tfoot class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                                                            <tr>
                                                                                <td colspan="2"></td>
                                                                                <td class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium">
                                                                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                                        Save
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                            @endforeach @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tab for Municipalities -->
                        <div class="tab-pane fade show active" id="municipalities" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="container-fluid mt-5">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="accordion accordion-flush mb-5" id="accordionProvinces">
                                            <div class="accordion-item">
                                                @foreach($adminprovinces as $key => $prov) @php $accordName =
                                                str_replace(' ', '_', strtolower($prov->province)); @endphp
                                                <h2 class="accordion-header" id="flush-headingOne">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse@php echo $accordName; @endphp" aria-expanded="false" aria-controls="flush-collapse@php echo $accordName; @endphp">
                                                        <p class="text-sm font-medium text-gray-900">{{ $prov->province }}</p>
                                                    </button>
                                                </h2>

                                                <div id="flush-collapse@php echo $accordName; @endphp" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionProvinces">
                                                    <div class="accordion-body">

                                                        <ul class="nav nav-pills sidepills">

                                                            @if($admindistricts ) @foreach($admindistricts as
                                                            $districts) @if($districts->provinceId === $prov->id) @php
                                                            $tablename =
                                                            $name = str_replace(' ', '_',
                                                            strtolower($districts->municipal_district));
                                                            @endphp
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="@php echo $name @endphp-tab" data-bs-toggle="tab" data-bs-target="#@php echo $name @endphp" type="button" role="tab" aria-controls="@php echo $name @endphp" aria-selected="false">
                                                                    @php echo $districts->municipal_district; @endphp
                                                                </a>
                                                            </li>
                                                            @endif @endforeach @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                                @endforeach


                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-md-9">
                                        <div class="tab-content">
                                            @if($admindistricts ) @foreach($admindistricts as $districts) @php
                                            $tablename = $name = str_replace(' ', '_',
                                            strtolower($districts->municipal_district));
                                            @endphp
                                            <div class="tab-pane fade" id="@php echo $name; @endphp" role="tabpanel" aria-labelledby="contact-tab">
                                                <!-- This example requires Tailwind CSS v2.0+ -->
                                                <form class="ajax" data-target="insertMunicipality" id="insertMunicipality" action="/admin/adminpanel/insertMunicipality" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" class="serviceId" value="{{$districts->id}}">
                                                    <div class="flex flex-col">
                                                        <div class="my-2 pb-5 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                                    <table class="min-w-full divide-y divide-gray-200">
                                                                        <thead class="bg-gray-50">
                                                                            <tr>
                                                                                <th colspan="2" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                                    Name
                                                                                </th>
                                                                                <th scope="col" class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium">
                                                                                    <div class="addRowMunicipality inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" data-target="@php echo $tablename; @endphpTable">
                                                                                        Add</div>
                                                                                </th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="bg-white divide-y divide-gray-200" id="@php echo $tablename; @endphpTable">
                                                                            @if($adminmunicipalities ?? '') @for($i=0;
                                                                            $i
                                                                            < count($adminmunicipalities); $i++) @if($adminmunicipalities[$i]->
                                                                                districtId === $districts->id)
                                                                                <tr id="muni{{$adminmunicipalities[$i]->id}}">
                                                                                    <td colspan="2" class="px-6 py-2 whitespace-nowrap">
                                                                                        <input disabled type="text" name="name_service" value="@php echo $adminmunicipalities[$i]->municipality; @endphp " autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                                    </td>
                                                                                    <td class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium" data-target="@php echo $tablename; @endphp">
                                                                                        <a href="/admin/adminpanel/deleteMuni/destroy/{{$adminmunicipalities[$i]->id}}" class="deleteBtn inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" id="{{$adminmunicipalities[$i]->id}}" onclick="deleteMunicipality('{{$adminmunicipalities[$i]->id}}');">Delete</a>
                                                                                    </td>
                                                                                </tr>
                                                                                @endif @endfor @endif


                                                                                <!-- More people... -->
                                                                        </tbody>
                                                                        <tfoot class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                                                            <tr>
                                                                                <td colspan="2"></td>
                                                                                <td class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium">
                                                                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                                        Save
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                            @endforeach @endif
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- Tab for Approvals -->
                        <div class="tab-pane fade" id="approvals" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="flex flex-col">
                                <div class="my-2 pb-5 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg" id="test">
                                            <table class="min-w-full divide-y divide-gray-200" id="businessTableWrapper">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Item
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Item Description
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                                        </th>
                                                        <th scope="col" class="relative px-6 py-3">
                                                            <span class="sr-only">Edit</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200" id="admintableadminbusinesses">
                                                    @foreach ($adminbusinesses as $business)
                                                    <tr id="busi{{ $business->id }}">
                                                        <td class="px-2 py-2 whitespace-nowrap">
                                                            <div class="flex items-center">

                                                                <div class="ml-4">
                                                                    <div class="text-sm font-medium text-gray-900">
                                                                        {{ $business->business_name }}
                                                                    </div>
                                                                    <div class="text-sm text-gray-500">
                                                                        {{ $business->email }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-2 py-2 whitespace-nowrap">
                                                            <div class="text-sm text-gray-900">{{ $business->province }}
                                                            </div>
                                                        </td>

                                                        <td class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium">
                                                            @if($business->activation_status == 0)
                                                            <a href="adminpanel/approveItem/{{$business->id}}" class="approveItemBtn inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" id="{{$business->id}}" onclick="approveItem('{{$business->id}}');">Approve</a>
                                                            @else
                                                            <a href="adminpanel/declineItem/{{$business->id}}" class="declineItemBtn inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" id="{{$business->id}}" onclick="declineItem('{{$business->id}}');">Decline</a>
                                                            @endif
                                                        </td>

                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

<script>


// Function to set the active tab and store it in the local storage
function setActiveTab(tabId) {
  // Set the active class to the selected tab
  const tabElement = document.getElementById(tabId);
  tabElement.classList.add('active');

  // Store the active tab ID in the local storage
  localStorage.setItem('activeTab', tabId);
}

// Function to retrieve the active tab from the local storage and set it as active
function getActiveTab() {
  // Get the active tab ID from the local storage
  const activeTabId = localStorage.getItem('activeTab');

  if (activeTabId) {
    // Remove the active class from all tabs
    const tabs = document.querySelectorAll('.nav-link');
    tabs.forEach(tab => {
      tab.classList.remove('active');
    });

    // Set the active class to the stored active tab
    const activeTab = document.getElementById(activeTabId);
    activeTab.classList.add('active');
  }
}

// Call the getActiveTab function when the page is loaded to set the active tab
window.addEventListener('DOMContentLoaded', getActiveTab);





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


    /*jQuery('form.ajax').on('submit', function(e) {
        e.preventDefault();
        var serviceArray = new Array(),
            id, target, refreshTarget;


        jQuery.map($("input[name='service_name[]']"), function(obj, index) {
            console.log($(obj).val());
            if ($(obj).val()) {
                serviceArray.push($(obj).val());
            }
        });

        id = $(this).find('.serviceId').val();
        target = $(this).data('target');
        refreshTarget = jQuery(this).parent().attr('id');

        console.log("the selected service industry ID: " + target);
        console.log("the parent ID: " + refreshTarget);
        

        jQuery.ajax({
            url: "/admin/adminpanel/"+target,
            type: 'post',
            data: {
                'service_name': serviceArray,
                'id': id
            },
            dataType: 'JSON',
            success: function(response) {
                console.log(response);
                jQuery('#test').load(" #businessTableWrapper");
                jQuery( "#"+refreshTarget ).load(window.location.href + " #"+refreshTarget );
                //jQuery("#"+refreshTarget).addClass("show active");
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
            }
        });
    }); */
</script>