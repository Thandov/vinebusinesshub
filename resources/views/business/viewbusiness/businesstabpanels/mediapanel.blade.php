<div class="tab-pane fade show active" id="pills-media" role="tabpanel" aria-labelledby="pills-media-tab">
    <form action="{{ route('business.updateLogo') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-12">Brand Identity</h1>
        <div>
            <p class="font-bold">Upload Logo</p>
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
        <!-- upload banner -->
        <p class="font-bold mt-3">Upload Cover Photo</p>
        <div class="mx-auto bg-white rounded-lg overflow-hidden shadow-lg p-4">
            <div class="image-preview border-2 border-dashed border-gray-300 mb-4">
                <img id="previewImage" src="#" alt="Image Preview">
            </div>
            <label for="imageInput" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-green-400 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Select</label>
            <input type="file" id="imageInput" class="hidden">

        </div>
        <!-- upload images -->
        <div>
            <p class="font-bold mt-3">Upload Photos/Posters</p>
            <div class="gallery_upload bg-slate-100 py-4 border-gray-300 border-dashed rounded-md">
                <input type="file" name="photos[]" id="photos" multiple class="hidden" accept="image/*" onchange="previewImages(event)">
                <label for="photos" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-green-400 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Upload</label>
                <div id="preview-container" class="grid grid-cols-4 gap-3 py-4">
                    @foreach($images as $image)
                    <div class="image-container relative rounded-lg overflow-hidden">
                        <img src="{{ asset('img/' . $image->image) }}" alt="Uploaded Image" class="object-cover w-full h-full">
                        <button class="delete-btn absolute top-2 right-2 bg-red-500 text-white rounded-full p-1" data-image-id="{{ $image->id }}">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6 my-4">
            <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-green-400 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Save</button>
        </div>
    </form>
</div>

<script>
    function previewImages(event) {
        const previewContainer = document.getElementById('preview-container');
        const files = event.target.files;
        for (const file of files) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('h-40', 'w-full', 'object-cover', 'rounded-md');

                // Create a container for each image with remove button
                const container = document.createElement('div');
                container.classList.add('relative');

                // Create remove button
                const removeBtn = document.createElement('button');
                removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                removeBtn.classList.add('absolute', 'top-2', 'right-2', 'px-2', 'py-1', 'bg-red-500', 'text-white', 'rounded');
                removeBtn.onclick = function() {
                    container.remove(); // Remove the container when remove button is clicked
                };

                // Append image and remove button to the container
                container.appendChild(img);
                container.appendChild(removeBtn);

                // Append container to the preview container
                previewContainer.appendChild(container);
            }
            reader.readAsDataURL(file);
        }
    }
    // -------------------banner-------------------------------------------
    const imageInput = document.getElementById('imageInput');
    const previewImage = document.getElementById('previewImage');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                previewImage.setAttribute('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
    // --------------------------------------------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                if (confirm('Are you sure you want to delete this image?')) {
                    const imageId = this.getAttribute('data-image-id');

                    // Send AJAX request to delete image
                    fetch(`/delete-image/${imageId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => {
                            if (response.ok) {
                                // Image deleted successfully, remove from the DOM
                                this.parentElement.remove();
                            } else {
                                // Error occurred, handle as needed
                                console.error('Error deleting image');
                            }
                        })
                        .catch(error => {
                            console.error('Error deleting image:', error);
                        });
                }
            });
        });
    });
</script>