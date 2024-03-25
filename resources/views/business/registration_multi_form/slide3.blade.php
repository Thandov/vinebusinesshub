<h1 class="text-3xl font-bold text-center text-gray-800 mb-12">Brand Identity</h1>
<div class="">
    <p class="font-bold mt-3">Upload Logo</p>
    <label for="logo" class="text-base font-semibold leading-7 text-gray-900">
        @error('logo')
        <p class="text-red-500 text-medium">
            {{ str_replace('logo field', 'logo', $message) }}
        </p>
        @enderror
    </label>
    <div class="grid grid-cols-3 gap-4">
        <x-img-upload image="{{ $post->icon ?? '' }}" classing="bigTall" />
    </div>
</div>
<div>
    <p class="font-bold mt-3">Upload Photos/Posters</p>
    <div class="gallery_upload bg-slate-100 py-4 border-gray-300 border-dashed rounded-md">
        <input type="file" name="photos[]" id="photos" multiple class="hidden" accept="image/*" onchange="previewImages(event)">
        <label for="photos" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-green-400 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Upload</label>
        <div id="preview-container" class="grid grid-cols-4 gap-4 py-4">
            <!-- images preview -->
        </div>
    </div>
</div>