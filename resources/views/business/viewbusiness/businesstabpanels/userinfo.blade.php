<div class="tab-pane fade" id="pills-userinfo" role="tabpanel" aria-labelledby="pills-userinfo-tab">
    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Company Representative </h3> 
                    <p class="mt-1 text-sm text-gray-600">Manage your company representative</p> 
                </div>
            </div>
            <div class="md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white space-y-6 sm:p-6">
                        <form action="{{ route('updateProfile') }}" method="POST">
                            @csrf
                            <div class="grid md:grid-cols-2 sm:grid-cols-2 gap-5 px-4 py-4">
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="company-rep" class="font-bold block text-sm text-gray-700">
                                        Company Representative
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" value="{{ $rep->name ?? '' }}" name="company_rep" id="company-rep" class="focus:ring-green-500 focus:border-green-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                    </div>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="company-email" class="font-bold block text-sm text-gray-700">
                                        Email Address
                                    </label>
                                    <div id="servicesList">
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" value="{{ $rep->email ?? '' }}" name="company_email" id="company-email" class="focus:ring-green-500 focus:border-green-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="www.example.com">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 sm:grid-cols-2 gap-5 px-4">
                                <div class="md:col-span-1 sm:col-span-2">
                                    <p class="block text-sm font-medium text-gray-700">
                                        <span class="font-bold">Created:</span>{{ $rep->created_at ?? '' }}
                                    </p>
                                </div>
                                <div class="md:col-span-1 sm:col-span-2">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                        Save
                                    </button>
                                </div>

                            </div>
                        </form>

                        <div class="md:col-span-1 sm:col-span-2 px-4 mb-3">
                            <label for="company-website" class="font-bold block text-sm text-gray-700">
                                Verification Status
                            </label>
                            <div id="verificationwrap" class="mt-2 d-flex align-items-center justify-content-start">
                                @if($business->email_verified_at == 0)
                                    <form method="POST" action="{{ route('verification.send') }}">
                                        @csrf
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 bg-yellow-600 hover:bg-yellow-700">
                                            Resend verification Email
                                        </button>
                                    </form>
                                @else
                                    <div class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                        Activated
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>