Social Media

<div class="col-span-12 sm:col-span-12">
    <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
    <input type="text" value="{{ $business->website ?? '' }}" name="website" id="website" autocomplete="address-level2" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-12 md:col-span-4 ">
    <label for="facebook" class="block text-sm font-medium text-gray-700">Facebook</label>
    <input type="text" value="{{ $business->facebook ?? '' }}" name="facebook" id="facebook" autocomplete="address-level2" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-12 md:col-span-4 ">
    <label for="twitter" class="block text-sm font-medium text-gray-700">Twitter</label>
    <input type="text" value="{{ $business->twitter ?? '' }}" name="twitter" id="twitter" autocomplete="address-level2" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="col-span-12 md:col-span-4 ">
    <label for="instagram" class="block text-sm font-medium text-gray-700">Instagram</label>
    <input type="text" value="{{ $business->instagram ?? '' }}" name="instagram" id="instagram" autocomplete="address-level2" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>