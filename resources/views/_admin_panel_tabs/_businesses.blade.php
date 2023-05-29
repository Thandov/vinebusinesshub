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
                                            <div class="p-4" id="-links">{{ $adminbusinesses->links() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>