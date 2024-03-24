<div class="tab-pane fade show active" id="pills-media" role="tabpanel" aria-labelledby="pills-media-tab">
    <form action="{{ route('business.updateLogo') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-12">Upload Your Professional Logo</h1>
        <div class="">
            <label for="logo" class="text-base font-semibold leading-7 text-gray-900">
                @error('logo')
                <p class="text-red-500 text-medium">
                    {{ str_replace('logo field', 'logo', $message) }}
                </p>
                @enderror
            </label>
            <div class="grid grid-cols-3 gap-4">
                <x-img-upload image="{{ $business->logo ?? '' }}" classing="bigTall" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6">
            <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-green-400 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Save</button>
        </div>
    </form>
</div>