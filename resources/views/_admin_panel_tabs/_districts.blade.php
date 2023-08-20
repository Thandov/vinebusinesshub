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
                                                                <a href="/admin/adminpanel/deleteMuni/destroy/{{$admindistricts[$i]->id}}" class="deleteBtn inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" id="{{$admindistricts[$i]->id}}" onclick="deleteMunicipality({{$admindistricts[$i]->id}});">Delete</a>
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