<!doctype html>
<html lang="en">
<head>
    @include('components.backend.head')
</head>

<body>
    @include('components.backend.header')
    @include('components.backend.sidebar')

    <div class="page-body">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Add Platina Brand Details</h4>
                    </div>
                    <div class="col-6 text-end">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{ route('platina-brand.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add Platina Brand Details</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Form Start -->
            <form action="{{ route('platina-brand.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">

                    <!-- Title -->
                    <div class="col-md-6">
                        <label>Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" placeholder="Enter title *" value="{{ old('title') }}">
                    </div>

                    <!-- Banner Image -->
                    <div class="col-md-6">
                        <label>Banner Image <span class="text-danger">*</span></label>
                        <input type="file" name="banner_image" class="form-control" accept="image/*" id="banner_image">
                        <img id="preview_banner" src="#" class="img-thumbnail mt-2" style="height:100px; display:none;">
                    </div>

                    <!-- Description -->
                    <div class="col-md-12">
                        <label>Description <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control" placeholder="Enter description *" rows="3">{{ old('description') }}</textarea>
                    </div>

                    <!-- Content Heading -->
                    <div class="col-md-12">
                        <label>Content Heading <span class="text-danger">*</span></label>
                        <input type="text" name="content_heading" class="form-control" placeholder="Enter content heading *" value="{{ old('content_heading') }}">
                    </div>

                  <!-- Content Heading Descriptions (Multiple) -->
<div class="col-md-12">
    <label>Content Heading Description <span class="text-danger">*</span></label>
    <div id="descriptions-wrapper">
        <div class="input-group mb-2">
            <input type="text" name="content_heading_descriptions[]" class="form-control" placeholder="Enter description">
            <button type="button" class="btn btn-success add-desc">Add More</button>
        </div>
    </div>
</div>

<!-- Extra Images (Multiple) -->
<div class="col-md-12">
    <label>Extra Images <span class="text-danger">*</span></label>
    <div id="extra-images-wrapper">
        <div class="input-group mb-2">
            <input type="file" name="extra_image[]" class="form-control" accept="image/*">
            <button type="button" class="btn btn-success add-extra">Add More</button>
        </div>
    </div>
</div>


                    <!-- Content Image -->
                    <div class="col-md-6">
                        <label>Content Image <span class="text-danger">*</span></label>
                        <input type="file" name="content_image" class="form-control" accept="image/*" id="content_image">
                        <img id="preview_content" src="#" class="img-thumbnail mt-2" style="height:100px; display:none;">
                    </div>

                    <!-- Content Description -->
                    <div class="col-md-12">
                        <label>Content Description <span class="text-danger">*</span></label>
                        <textarea name="content_description" class="form-control" placeholder="Enter content description *" rows="3">{{ old('content_description') }}</textarea>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="text-end mt-3">
                    <a href="{{ route('platina-brand.index') }}" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    @include('components.backend.footer')
    @include('components.backend.main-js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add more descriptions
        document.querySelector('.add-desc').addEventListener('click', function () {
            const wrapper = document.getElementById('descriptions-wrapper');
            const newField = document.createElement('div');
            newField.classList.add('input-group', 'mb-2');
            newField.innerHTML = `
                <input type="text" name="content_heading_descriptions[]" class="form-control" placeholder="Enter description">
                <button type="button" class="btn btn-danger remove-desc">Remove</button>
            `;
            wrapper.appendChild(newField);
        });

        // Remove description
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-desc')) {
                e.target.parentElement.remove();
            }
        });

        // Add more extra image fields
        document.querySelector('.add-extra').addEventListener('click', function () {
            const wrapper = document.getElementById('extra-images-wrapper');
            const newField = document.createElement('div');
            newField.classList.add('input-group', 'mb-2');
            newField.innerHTML = `
                <input type="file" name="extra_image[]" class="form-control" accept="image/*">
                <button type="button" class="btn btn-danger remove-extra">Remove</button>
            `;
            wrapper.appendChild(newField);
        });

        // Remove extra image field
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-extra')) {
                e.target.parentElement.remove();
            }
        });
    });
</script>

    <!-- Image Preview Script -->
    <script>
        function previewImage(inputId, imgId) {
            const input = document.getElementById(inputId);
            const img = document.getElementById(imgId);

            input.addEventListener('change', function () {
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        img.src = e.target.result;
                        img.style.display = 'block';
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function () {
            previewImage('banner_image', 'preview_banner');
            previewImage('extra_image', 'preview_extra');
            previewImage('content_image', 'preview_content');
        });
    </script>
</body>
</html>
