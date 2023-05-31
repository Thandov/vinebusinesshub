<div class="tab-pane fade" id="pendingApproval" role="tabpanel" aria-labelledby="pendingApprovals-tab">
    <div class="flex flex-col">
        <div class=" overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg" id="test">
                    <table class="min-w-full divide-y divide-gray-200" id="pendingTableWrapper">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Item
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Business Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="pendingApprovals">
                            @foreach ($adminpending_approvals as $adminpending_approval)
                            <tr id="adminpending_approval{{ $adminpending_approval->id }}">
                                <td class="px-2 py-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $adminpending_approval->the_content }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-2 py-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $adminpending_approval->approval_type }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
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
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full @if ($adminpending_approval->approval_status == 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($adminpending_approval->approval_status == 'Approved') bg-green-100 text-green-800
                                        @elseif($adminpending_approval->approval_status == 'Declined') bg-red-100 text-red-800 @endif" id="span{{ $adminpending_approval->id }}">
                                        {{ $adminpending_approval->approval_status }}
                                    </span>
                                </td>
                                <td class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="adminpanel/approveIndustry/{{ $adminpending_approval->id }}" data-approvalstatus="{{$adminpending_approval->approval_status}}" class="btn-button text-white inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 @if($adminpending_approval->approval_status == 'Declined') focus:ring-green-500 bg-green-700 @elseif($adminpending_approval->approval_status == 'Approved') bg-red-500 @elseif($adminpending_approval->approval_status == 2) bg-green-700 @elseif($adminpending_approval->approval_status == 'pending') bg-green-700 @endif" id="approval_button{{ $adminpending_approval->id }}">
                                        @php if( $adminpending_approval->approval_status === 'Approved'){echo "Decline";} else { echo 'Approve';} @endphp
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6" id="-links">
                    <tr>
                        <td>
                            {{ $adminpending_approvals->links() }}
                        </td>
                    </tr>
                </div>
            </div>
        </div>
    </div>
</div>