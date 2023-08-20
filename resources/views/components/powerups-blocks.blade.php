 <div class="grid sm:grid-flow-row md:grid-cols-4 gap-4">
     @php
         $powerups = App\Models\Powerup::all();
     @endphp
     @foreach ($powerups as $powerup)
         @php
             $words = explode(' ', $powerup->name);
             
             $link = str_replace(' ', '_', strtolower($words[0]));
         @endphp
         <a href="bdashboard/{{ $link }}">

             <div
                 class="bg-white shadow-md flex flex-col items-center text-center justify-center rounded-lg hover:bg-green-500 hover:text-green-500 p-4">
                 <img src="data:image/svg+xml;base64,{{ base64_encode($powerup->icon) }}" class="h-6 w-6"
                     alt="Powerup Icon">

                 <p class="mt-2 text-sm">{{ $powerup->name }}</p>
             </div>
         </a>
     @endforeach
 </div>
