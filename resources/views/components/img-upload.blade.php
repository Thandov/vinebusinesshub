<div class="col-span-2 flex items-center mt-1 justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md" style="height: 250px; position: relative">
    @if (isset($image) && $image ?? '')
    <img id="profile_picture_preview" src="{{ asset('img/'.$image) }}" alt="sasas Picture">
    @else
    <img id="profile_picture_preview" src="#" alt="Profile Picture"> <!-- Add a default image source or leave it blank -->
    @endif
    <label for="profile_picture_input" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
        <input id="profile_picture_input" name="profile_picture" type="file" class="sr-only">
        <span class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 position-absolute" style="top: 0; left: 0">
            Change
        </span>
    </label>
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