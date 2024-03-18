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
        <x-img-upload image="{{ $post->icon ?? '' }}" classing="bigTall" />
    </div>
</div>