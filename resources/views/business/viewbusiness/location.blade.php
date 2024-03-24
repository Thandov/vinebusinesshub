   <?php 
   if(!isset($provinces)){
    $provinces = $businessData['provinces'];
   }
   ?>
   <div class="grid grid-cols-12 gap-6">
       <div class="col-span-12 md:col-span-6">
           <label for="address" class="text-base font-semibold leading-7 text-gray-900">Street
               address
               @error('address')
                   <p class="text-red-500 text-medium">
                       {{ $message }}
                   </p>
               @enderror
           </label>
           <input type="text" value="{{ $business->address ?? '' }}" name="address" id="address" autocomplete="address" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
       </div>
       <div class="col-span-12 md:col-span-6">
           <label for="province" class="text-base font-semibold leading-7 text-gray-900">Province @error('province') <p class="text-red-500 text-medium"> {{ $message }} </p> @enderror </label>
           <select id="provinceOptions" name="provinceId" autocomplete="province" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
               @if($provinces ?? '')
                   @foreach($provinces as $prov)
                       <option value="{{ $prov->id ?? '' }}" @if(isset($business->provinceId) !=null) @if ($prov->id == $business->provinceId ) selected @else ''; @endif @endif>
                           {{ $prov->province }}
                       </option>
                   @endforeach
               @endif
           </select>
       </div>
       <div class="col-span-12 md:col-span-4">
           <label for="district" class="text-base font-semibold leading-7 text-gray-900">District</label>
           <select id="districtOptions" name="districtId" autocomplete="districtId" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
               @if($districts ?? '')
                   @foreach($districts as $dist)
                       @if($dist->provinceId === $business->provinceId)
                           <option value="{{ $dist->id ?? '' }}" @if ($dist->id === $business->districtId) selected @endif>
                               {{ $dist->municipal_district }}
                           </option>
                       @endif
                   @endforeach
               @endif
           </select>
       </div>
       <div class="col-span-12 md:col-span-4">
           <label for="municipality" class="text-base font-semibold leading-7 text-gray-900">Municipality</label>
           <select id="municipalityOptions" name="municipalityId" autocomplete="municipalityId" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">

               @if($municipalities ?? '')
                   @foreach($municipalities as $municipality)
                       @if($municipality->districtId === $business->districtId)
                           <option value="{{ $municipality->id ?? '' }}" @if ($municipality->id === $business->municipalityId) selected @endif>

                               {{ $municipality->municipality }}
                           </option>
                       @endif
                   @endforeach
               @endif
           </select>
       </div>
       <div class="col-span-12 md:col-span-4">
           <label for="town" class="text-base font-semibold leading-7 text-gray-900">Town</label>
           <input type="text" value="{{ $business->town ?? '' }}" name="town" id="town" autocomplete="town" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
       </div>
   </div>