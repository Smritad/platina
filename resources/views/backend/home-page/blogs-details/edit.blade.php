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
                        <h4>Edit Blogs Details</h4>
                    </div>
                    <div class="col-6 text-end">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{ route('blogs-details.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Blogs Details</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Form Start -->
            <form action="{{ route('blogs-details.update', $brandEthosDetails->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Section 1 -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <strong>Section 1: Main Information</strong>
                    </div>
                    <div class="card-body row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{ $brandEthosDetails->title }}" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Heading <span class="text-danger">*</span></label>
                            <input type="text" name="heading" value="{{ $brandEthosDetails->heading }}" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Section 2 -->
                <div class="card mt-4">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <strong>Section 2: Title, Description & Image</strong>
                        <button type="button" class="btn btn-success btn-sm" id="addCounter">+ Add</button>
                    </div>
                    <div class="card-body" id="counterWrapper">
                        @foreach($counterItems as $index => $item)
                            <div class="row g-3 align-items-center counter-group mb-3">
                                <div class="col-md-3">
                                    <input type="text" name="counter_text[]" class="form-control" placeholder="Enter Title" value="{{ $item['text'] }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="counter_description[]" class="form-control" placeholder="Enter Description" value="{{ $item['description'] }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="file" name="image[]" class="form-control counter-image-input" accept="image/*">
                                    <input type="hidden" name="existing_images[]" value="{{ $item['image'] }}">
                                    <small class="text-muted">Leave blank to keep existing image.</small>
                                </div>
                                <div class="col-md-2 text-center">
                                    @if(!empty($item['image']))
                                        <img src="{{ asset('platina/home/blogs/' . $item['image']) }}" class="img-preview rounded" style="max-width: 80px; max-height: 80px;">
                                    @else
                                        <img src="#" class="img-preview rounded" style="max-width: 80px; max-height: 80px; display: none;">
                                    @endif
                                </div>
                                <div class="col-md-1 text-center mt-2">
                                    <button type="button" class="btn btn-danger remove-counter">−</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Submit -->
                <div class="text-end mt-4">
                    <a href="{{ route('blogs-details.index') }}" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    @include('components.backend.footer')
    @include('components.backend.main-js')

    <!-- Dynamic Counter Script -->
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
                if (e.target.classList.contains('remove-counter')) {
                    e.target.closest('.counter-group').remove();
                }
            });

            wrapper.addEventListener('change', function (e) {
                if (e.target.classList.contains('counter-image-input')) {
                    handleImagePreview(e.target);
                }
            });

            document.getElementById('addCounter').addEventListener('click', () => {
                const newGroup = document.createElement('div');
                newGroup.className = 'row g-3 align-items-center counter-group mb-3';
                newGroup.innerHTML = `
                    <div class="col-md-3">
                        <input type="text" name="counter_text[]" class="form-control" placeholder="Enter Title">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="counter_description[]" class="form-control" placeholder="Enter Description">
                    </div>
                    <div class="col-md-3">
                        <input type="file" name="image[]" class="form-control counter-image-input" accept="image/*">
                        <input type="hidden" name="existing_images[]" value="">
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="#" class="img-preview rounded" style="max-width: 80px; max-height: 80px; display: none;">
                    </div>
                    <div class="col-md-1 text-center mt-2">
                        <button type="button" class="btn btn-danger remove-counter">−</button>
                    </div>
                `;
                wrapper.appendChild(newGroup);
            });
        });
    </script>
</body>
</html>
