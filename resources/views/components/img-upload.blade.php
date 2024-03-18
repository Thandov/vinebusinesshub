<!-- Ensure the relevant framework-specific blade or HTML tags are added properly -->

<div id="profile_pic_wrapper" class="{{$classing}} col-span-1 overflow-hidden flex items-center justify-center">
    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
        <div class="text-center">
            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
            </svg>
            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                <label for="profile_picture_input" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                    <span>Upload a file</span>
                    <input id="profile_picture_input" name="profile_picture" type="file" class="sr-only">
                </label>
                <p class="pl-1">or drag and drop</p>
            </div>
            <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
        </div>
    </div>
</div>
<div class="col-span-2 flex items-center mt-1 justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md" style="height: 250px; position: relative">
    @if (isset($image) && $image ?? '')
    <img id="profile_picture_preview" src="{{ asset($image) }}" alt="sasas Picture">
    @else
    <img id="profile_picture_preview" src="#" alt="Profile Picture"> <!-- Add a default image source or leave it blank -->
    @endif
    <button id="change-logo-btn" type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 position-absolute" style="top: 0; left: 0">
        Change
    </button>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to handle the file input change event
        function handleFileInputChange(event) {
            const file = event.target.files[0];
            if (file) {
                // Read the selected file as a Data URL
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Set the preview image source to the selected file
                    document.getElementById('profile_picture_preview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        // Add change event listener to the profile picture input
        document.getElementById('profile_picture_input').addEventListener('change', handleFileInputChange);
    });
</script>