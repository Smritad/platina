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
                        <h4>Edit Brand Ethos Details</h4>
                    </div>
                    <div class="col-6 text-end">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item">
                                <a href="{{ route('brand-ethos-details.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Brand Ethos</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <form action="{{ route('Premium-details.update', $premiumDetails->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Section 1 -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <strong>Section 1: Main Information</strong>
                    </div>
                    <div class="card-body row g-4">
                        <div class="col-md-6">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $premiumDetails->title }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="heading" class="form-label">Heading <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="heading" id="heading" value="{{ $premiumDetails->heading }}" required>
                        </div>
                    </div>
                </div>

                <!-- Section 2 -->
                <div class="card mt-4">
                    <div class="card-header bg-primary text-white">
                        <strong>Section 2: Text, Description & Image</strong>
                    </div>
                    <div class="card-body">
                        <div id="counterWrapper">
                            @foreach($counterItems as $index => $item)
                            <div class="row g-3 align-items-center counter-group mb-3">
                                <div class="col-md-3">
                                    <input type="text" name="counter_text[]" class="form-control" value="{{ $item['text'] }}" placeholder="Enter Text">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="counter_description[]" class="form-control" value="{{ $item['description'] }}" placeholder="Enter Description">
                                </div>
                                <div class="col-md-3">
                                    <input type="file" name="counter_image[]" class="form-control counter-image-input" accept="image/*">
                                    <small class="text-muted">Max size 2MB. JPG, PNG, JPEG, WEBP only.</small>
                                    <input type="hidden" name="existing_images[]" value="{{ $item['image'] }}">
                                </div>
                                <div class="col-md-2 text-center">
                                    <img src="{{ asset('/platina/home/premium/' . $item['image']) }}" class="img-preview rounded" style="max-width: 80px; max-height: 80px;" />
                                </div>
                                <div class="col-md-1 text-center">
                                    @if ($index == 0)
                                    <button type="button" class="btn btn-success add-counter">+</button>
                                    @else
                                    <button type="button" class="btn btn-danger remove-counter">−</button>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="text-end mt-4">
                    <a href="{{ route('brand-ethos-details.index') }}" class="btn btn-danger">Cancel</a>
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
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const wrapper = document.getElementById('counterWrapper');

            wrapper.addEventListener('click', function (e) {
                if (e.target.classList.contains('add-counter')) {
                    const html = `
                        <div class="row g-3 align-items-center counter-group mb-3">
                            <div class="col-md-3">
                                <input type="text" name="counter_text[]" class="form-control" placeholder="Enter Text">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="counter_description[]" class="form-control" placeholder="Enter Description">
                            </div>
                            <div class="col-md-3">
                                <input type="file" name="counter_image[]" class="form-control counter-image-input" accept="image/*">
                                <small class="text-muted">Max size 2MB. JPG, PNG, JPEG, WEBP only.</small>
                                <input type="hidden" name="existing_images[]" value="">
                            </div>
                            <div class="col-md-2 text-center">
                                <img src="#" class="img-preview rounded" style="max-width: 80px; max-height: 80px; display: none;" />
                            </div>
                            <div class="col-md-1 text-center">
                                <button type="button" class="btn btn-danger remove-counter">−</button>
                            </div>
                        </div>`;
                    wrapper.insertAdjacentHTML('beforeend', html);
                }

                if (e.target.classList.contains('remove-counter')) {
                    e.target.closest('.counter-group').remove();
                }
            });

            wrapper.addEventListener('change', function (e) {
                if (e.target.classList.contains('counter-image-input')) {
                    handleImagePreview(e.target);
                }
            });
        });
    </script>
</body>
</html>
