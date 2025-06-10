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
                        <h4>Edit Testimonial Details Form</h4>
                    </div>
                    <div class="col-6 text-end">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item">
                                <a href="{{ route('testimonials-details.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Testimonial Details</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Edit Form -->
            <form action="{{ route('testimonials-details.update', $premiumDetails->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Main Info -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <strong>Section 1: Main Information</strong>
                    </div>
                    <div class="card-body row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $premiumDetails->title) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Heading <span class="text-danger">*</span></label>
                            <input type="text" name="heading" class="form-control" value="{{ old('heading', $premiumDetails->heading) }}" required>
                        </div>
                    </div>
                </div>

                <!-- Details Section -->
                <div class="card mt-4">
                    <div class="card-header bg-primary text-white">
                        <strong>Section 2: Title, Designation, Description & Image</strong>
                    </div>
                    <div class="card-body">
                        <div id="counterWrapper">
                            @foreach ($counterItems as $index => $item)
                                <div class="row g-3 align-items-center counter-group mb-3">
                                    <div class="col-md-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="text[]" class="form-control" value="{{ $item['text'] }}" placeholder="Enter Title">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Designation</label>
                                        <input type="text" name="designations[]" class="form-control" value="{{ $item['designations'] }}" placeholder="Enter Designation">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Description</label>
                                        <input type="text" name="description[]" class="form-control" value="{{ $item['description'] }}" placeholder="Enter Description">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="image[]" class="form-control image-input" accept="image/*">
                                        <input type="hidden" name="existing_images[]" value="{{ $item['image'] }}">
                                        <small class="text-muted">Max size 2MB. JPG, PNG, JPEG, WEBP only.</small>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        @if (!empty($item['image']))
                                            <img src="{{ asset('platina/home/testimonials/' . $item['image']) }}" class="img-preview rounded" style="max-width: 80px; max-height: 80px;">
                                        @else
                                            <img src="#" class="img-preview rounded" style="max-width: 80px; max-height: 80px; display: none;">
                                        @endif
                                    </div>
                                    <div class="col-md-2 text-center mt-4 d-flex gap-2">
                                        <button type="button" class="btn btn-danger remove-counter">−</button>
                                        <button type="button" class="btn btn-success add-counter">+</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="text-end mt-4">
                    <a href="{{ route('testimonials-details.index') }}" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    @include('components.backend.footer')
    @include('components.backend.main-js')

    <script>
        function handleImagePreview(input) {
            const img = input.closest('.counter-group').querySelector('.img-preview');
            const file = input.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = e => {
                    img.src = e.target.result;
                    img.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                img.src = '';
                img.style.display = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const wrapper = document.getElementById('counterWrapper');

            wrapper.addEventListener('click', function (e) {
                if (e.target.classList.contains('add-counter')) {
                    const html = `
                        <div class="row g-3 align-items-center counter-group mb-3">
                            <div class="col-md-3">
                                <input type="text" name="text[]" class="form-control" placeholder="Enter Title">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="designations[]" class="form-control" placeholder="Enter Designation">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="description[]" class="form-control" placeholder="Enter Description">
                            </div>
                            <div class="col-md-3">
                                <input type="file" name="image[]" class="form-control image-input" accept="image/*">
                                <input type="hidden" name="existing_images[]" value="">
                                <small class="text-muted">Max size 2MB. JPG, PNG, JPEG, WEBP only.</small>
                            </div>
                            <div class="col-md-2 text-center">
                                <img src="#" class="img-preview rounded" style="max-width: 80px; max-height: 80px; display: none;">
                            </div>
                            <div class="col-md-2 text-center mt-4 d-flex gap-2">
                                <button type="button" class="btn btn-danger remove-counter">−</button>
                                <button type="button" class="btn btn-success add-counter">+</button>
                            </div>
                        </div>`;
                    wrapper.insertAdjacentHTML('beforeend', html);
                }

                if (e.target.classList.contains('remove-counter')) {
                    e.target.closest('.counter-group').remove();
                }
            });

            wrapper.addEventListener('change', function (e) {
                if (e.target.classList.contains('image-input')) {
                    handleImagePreview(e.target);
                }
            });
        });
    </script>
</body>
</html>
