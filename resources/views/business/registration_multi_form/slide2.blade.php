<h1>Upload Pictures</h1>
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <label for="logo" class="block text-sm font-medium text-gray-700">
            Logo
            @error('logo')
            <p class="text-red-500 text-medium">
                {{ str_replace('logo field', 'logo', $message) }}
            </p>
            @enderror
        </label>
        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
            <x-img-upload image="{{ $post->icon ?? '' }}" classing="bigTall" />
            @if (!empty($business->logo))
            <img style="width: 250px" src="/img/{{ $business->logo }}" alt="{{ $business->logo }}" srcset="">
            @endif
        </div>
        <div class="mt-1 flex items-center">
            <button id="change-logo-btn" type="button" class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Change
            </button>
        </div>
    </div>
</div>