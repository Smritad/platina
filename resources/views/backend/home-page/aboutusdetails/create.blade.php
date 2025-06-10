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
            <!-- Page Title -->
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Add About Us Details Form</h4>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item">
                                <a href="{{ route('aboutus-details-platina.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Add About Us Details</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>About Us Details Form</h4>
                            <p class="f-m-light mt-1">Fill in the correct details and submit the form.</p>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('aboutus-details-platina.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                               <!-- Section 1 -->
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
        <input type="text" name="title" id="title" placeholder="Enter title" class="form-control" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="subtitle" class="form-label">Subtitle <span class="text-danger">*</span></label>
        <input type="text" name="subtitle" id="subtitle" placeholder="Enter subtitle" class="form-control" required>
    </div>

    <div class="col-12 mb-3">
        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
        <textarea name="description" id="summernote" placeholder="Enter description" class="form-control" required></textarea>
    </div>

    <div class="col-md-6 mb-3">
        <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
        <input type="file" name="image" id="banner_image" class="form-control" accept=".jpg,.jpeg,.png,.webp" onchange="previewBannerImage()" required>
    </div>

    <!-- Image Preview -->
    <div class="col-md-6 mb-3" id="bannerImagePreviewContainer" style="display:none;">
        <label class="form-label">Image Preview</label>
        <img id="banner_image_preview" src="" alt="Image Preview" class="img-fluid rounded" style="max-height: 200px;">
    </div>
</div>

<!-- Section 2: Multiple Counters -->
<div class="row mb-2">
    <div class="col-12">
        <label class="form-label">Counters</label>
        <div id="counterWrapper">
            <div class="row mb-2 counter-group">
                <div class="col-md-5">
                    <input type="text" name="counter_text[]" class="form-control" placeholder="Enter counter text">
                </div>
                <div class="col-md-5">
                    <input type="text" name="counter_description[]" class="form-control" placeholder="Enter counter description">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-success add-counter">+</button>
                </div>
            </div>
        </div>
    </div>
</div>


                                <!-- Submit Buttons -->
                                <div class="mt-4 text-end">
                                    <a href="{{ route('aboutus-details-platina.index') }}" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div> <!-- card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.backend.footer')
    @include('components.backend.main-js')

    <!-- Image Preview Script -->
    <script>
        function previewBannerImage() {
            const file = document.getElementById('banner_image').files[0];
            const previewContainer = document.getElementById('bannerImagePreviewContainer');
            const previewImage = document.getElementById('banner_image_preview');

            previewImage.src = '';
            previewContainer.style.display = 'none';

            if (file) {
                const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
                if (validTypes.includes(file.type)) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewImage.src = e.target.result;
                        previewContainer.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert('Only image files (jpg, jpeg, png, webp) are allowed.');
                }
            }
        }
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const wrapper = document.getElementById('counterWrapper');

        wrapper.addEventListener('click', function (e) {
            if (e.target.classList.contains('add-counter')) {
                const newGroup = document.createElement('div');
                newGroup.className = 'row mb-2 counter-group';
                newGroup.innerHTML = `
                    <div class="col-md-5">
                        <input type="text" name="counter_text[]" class="form-control" placeholder="Enter counter text">
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="counter_description[]" class="form-control" placeholder="Enter counter description">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-counter">-</button>
                    </div>
                `;
                wrapper.appendChild(newGroup);
            }

            if (e.target.classList.contains('remove-counter')) {
                e.target.closest('.counter-group').remove();
            }
        });
    });
</script>

</body>
</html>
