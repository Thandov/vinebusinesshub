<div class="tab-pane fade" id="pendingApproval" role="tabpanel"
                            aria-labelledby="pendingApprovals-tab">
                            <div class="flex flex-col">
                                <div class="my-2 pb-5 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div
                                            class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"id="test">
                                            <table
                                                class="min-w-full divide-y divide-gray-200"id="pendingTableWrapper">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th
                                                            scope="col"class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Item
                                                        </th>
                                                        <th
                                                            scope="col"class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Description
                                                        </th>
                                                        <th
                                                            scope="col"class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Business Name
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Status
                                                        </th>
                                                        <th scope="col" class="relative px-6 py-3">
                                                            <span class="sr-only">Edit</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200"id="pendingApprovals">
                                                    @foreach ($adminpending_approvals as $adminpending_approval)
                                                        <tr
                                                            id="adminpending_approval{{ $adminpending_approval->id }}">
                                                            <td class="px-2 py-2 whitespace-nowrap">
                                                                <div class="flex items-center">
                                                                    <div class="ml-4">
                                                                        <div class="text-sm font-medium text-gray-900">
                                                                            {{ $adminpending_approval->the_content }}
                                                                        </div>
                                                            <td class="px-2 py-2 whitespace-nowrap">
                                                                <div class="flex items-center">
                                                                    <div class="ml-4">
                                                                        <div class="text-sm font-medium text-gray-900">
                                                                            {{ $adminpending_approval->approval_type }}
                                                                        </div>
                                                            <td class="px-2 py-2 whitespace-nowrap">
                                                                <div class="flex items-center">
                                                                    <div class="ml-4">
                                                                        <div class="text-sm font-medium text-gray-900">
                                                                            {{ $adminpending_approval->business_name }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-2 py-2 whitespace-nowrap">

                                                                <span
                                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                                                        @if ($adminpending_approval->approval_status == 0) bg-yellow-100 text-yellow-800 
                                                                                        @elseif($adminpending_approval->approval_status == 1) bg-green-100 text-green-800 
                                                                                        @elseif($adminpending_approval->approval_status == 2) bg-red-100 text-red-800 @endif">
                                                                    @if ($adminpending_approval->approval_status == 0)
                                                                        Pending Approval
                                                                    @elseif($adminpending_approval->approval_status == 1)
                                                                        Approved
                                                                    @elseif($adminpending_approval->approval_status == 2)
                                                                        Declined
                                                                    @endif
                                                                </span>
                                                            </td>
                                                            <td
                                                                class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium">
                                                                @if ($adminpending_approval->approval_status == 0)
                                                                    <a href="adminpanel/approveIndustry/{{ $adminpending_approval->id }}"
                                                                        class="approvalBtn inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                                        id="{{ $adminpending_approval->id }}" on
                                                                        click="approveIndustry({{ $adminpending_approval->id }});">Approve</a>
                                                                @elseif($adminpending_approval->approval_status == 1)
                                                                    <a href="adminpanel/declineIndustry/{{ $adminpending_approval->id }}"
                                                                        class="declineBtn inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500"
                                                                        id="{{ $adminpending_approval->id }}" on
                                                                        click="declineIndustry({{ $adminpending_approval->id }});">Decline</a>
                                                                @elseif($adminpending_approval->approval_status == 2)
                                                                    <a href="adminpanel/approveIndustry/{{ $adminpending_approval->id }}"
                                                                        class="approvalBtn inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                                        id="{{ $adminpending_approval->id }}" on
                                                                        click="approveIndustry({{ $adminpending_approval->id }});">Approve</a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div id="-links">{{ $adminpending_approvals->links() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>