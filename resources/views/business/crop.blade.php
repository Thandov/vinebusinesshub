@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Image Crop</div>

                    <div class="card-body">
                        <img id="crop-image" src="/storage/{{ session('logoImagePath') }}" alt="Logo to crop">

                        <form action="{{ route('business.cropLogo') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="crop-width">Width:</label>
                                <input type="text" id="crop-width" name="width" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="crop-height">Height:</label>
                                <input type="text" id="crop-height" name="height" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="crop-x">X Coordinate:</label>
                                <input type="text" id="crop-x" name="x" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="crop-y">Y Coordinate:</label>
                                <input type="text" id="crop-y" name="y" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Crop Image</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var cropper = new Cropper(document.getElementById('crop-image'), {
                aspectRatio: 1, // Set the aspect ratio according to your requirements
                // Add other options and callbacks as needed
            });

            // Capture the cropping data and update the hidden input fields
            $('form').submit(function(e) {
                e.preventDefault();
                $('#crop-width').val(Math.round(cropper.getData().width));
                $('#crop-height').val(Math.round(cropper.getData().height));
                $('#crop-x').val(Math.round(cropper.getData().x));
                $('#crop-y').val(Math.round(cropper.getData().y));
                this.submit();
            });
        });
    </script>
@endsection
