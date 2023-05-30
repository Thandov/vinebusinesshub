<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    @if ($adminindustries ?? '')
        <form class="ajax" data-target="insertIndustry" id="insertIndustry" action="admin/adminpanel/insertIndustry"
            method="post">
            @csrf
            <input type="hidden" class="serviceId" name="id" value="abc">
            <div class="flex flex-col">
                <div class=" overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th colspan="2"
                                            class="px-6 py-0 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">
                                            <div class="addRowIndustry inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                data-target="industriesTable">Add</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200" id="industriesTable">
                                    @foreach ($adminindustries as $indust)
                                        <tr id="ind{{ $indust->id }}">
                                            <td colspan="2" class="px-6 py-1 whitespace-nowrap">
                                                <p class="text-sm font-medium text-gray-900">{{ $indust->industry }}</p>
                                            </td>
                                            <td class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium"
                                                data-target="industriesTable">
                                                <a href="/adminpanel/deleteIndustry/{{ $indust->id }}"
                                                    onclick="deleteIndustry('{{ $indust->id }}')"
                                                    class="deleteIndustryBtn inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                                    id="{{ $indust->id }}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- More people... -->
                                </tbody>
                                <tfoot class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <tr>
                                        <td colspan="2">
                                            <div class="px-4" id="-links">{{ $adminindustries->links() }}</div>
                                        </td>
                                        <td class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium">
                                            <button type="submit"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
