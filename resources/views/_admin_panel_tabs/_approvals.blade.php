<div class="tab-pane fade" id="Approvals" role="tabpanel" aria-labelledby="Approvals-tab">
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg" id="test">
                    <table class="min-w-full divide-y divide-gray-200" id="pendingTableWrapper">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Approved Items
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Admin Name
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="pendingApprovals">
                            @foreach ($adminpending_approvals as $adminpending_approval)
                                @if ($adminpending_approval->approval_status == 'Approved')
                                    <tr id="adminpending_approval{{ $adminpending_approval->id }}">
                                        <td class="px-2 py-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-4 text-sm font-medium text-gray-900">
                                                    {{ $adminpending_approval->the_content }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-2 py-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-4 text-sm font-medium text-gray-900">
                                                    {{ $adminpending_approval->approval_type }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-2 py-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-4 text-sm font-medium text-gray-900">
                                                    {{ $adminpending_approval->name }}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6" id="-links">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
