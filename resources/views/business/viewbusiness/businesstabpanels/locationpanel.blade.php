<div class="tab-pane fade show active" id="pills-location" role="tabpanel" aria-labelledby="pills-location-tab">
    <form action="{{ route('business.updateClientLocation') }}" method="post">
        @csrf
        <input type="hidden" name="bid" value="{{ $business->id }}">
         <div class="mb-4">
        @include('business.viewbusiness.location')
         </div>
        <div class="grid grid-cols-2 gap-6">
            <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-green-400 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Save</button>
        </div>
    </form>
</div>