<!-- Ensure the relevant framework-specific blade or HTML tags are added properly -->
<!-- <div id="profile_pic_wrapper" class="{{$classing}} shadow overflow-hidden border-b border-gray-200 sm:rounded-lg relative">
    <label for="profile_picture_input">
        @if (isset($image) && $image ?? '')
        <img id="profile_picture_preview" src="{{ asset($image) }}" alt="Profile Picture" class="object-cover w-full h-full">
        @else
        <img id="profile_picture_preview" src="#" alt="Profile Picture" class="object-cover w-full h-full">  
        @endif
    </label>
    <input id="profile_picture_input" type="file" name="profile_picture" style="display: none;">
</div> -->
<div class="space-y-1 text-center" id="logouploader">
    <label for="profile_picture_input">
        <input id="profile_picture_input" type="file" name="profile_picture" style="display: none;">
        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <div class="text-sm text-gray-600">
            <label id="upload_label" for="profile_picture_input" class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                <span>Upload a file</span>
            </label>
            <p class="pl-1">or drag and drop</p>
        </div>
        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
    </label>
    <img id="profile_picture_preview" class="mt-2" src="" alt="Profile Picture Preview" style="max-width: 150px; max-height: 150px; display: none;">
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
                    const previewImage = document.getElementById('profile_picture_preview');
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block'; // Show the preview image

                    // Hide the file input element
                    const fileInput = document.getElementById('profile_picture_input');
                    fileInput.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        }

        // Add change event listener to the profile picture input
        document.getElementById('profile_picture_input').addEventListener('change', handleFileInputChange);
    });
</script>