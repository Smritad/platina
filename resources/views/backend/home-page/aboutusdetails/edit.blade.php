<!doctype html>
<html lang="en">
<head>
    @include('components.backend.head')
</head>

@include('components.backend.header')
@include('components.backend.sidebar')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Edit About Us Details</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('aboutus-details-platina.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit About Us Details</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Form -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>About Us Details Form</h4>
                        <p class="f-m-light mt-1">Edit your details and update the form.</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('aboutus-details-platina.update', $aboutus->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Section 1 -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" value="{{ $aboutus->title }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Subtitle <span class="text-danger">*</span></label>
                                    <input type="text" name="subtitle" class="form-control" value="{{ $aboutus->subtitle }}" required>
                                </div>
                                <div class="col-12">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea name="description" id="summernote" class="form-control" required>{{ $aboutus->description }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png,.webp" onchange="previewImage(this)">
                                    @if ($aboutus->image)
                                        <div id="bannerImagePreviewContainer" class="mt-2">
                                            <img id="banner_image_preview" src="{{ asset('platina/home/banner/' . $aboutus->image) }}" width="120">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Section 2 -->
<h5 class="mt-4">Counters</h5>
<div class="row mb-2">
    <div class="col-12">
        <div id="counterWrapper">
            @php
                $texts = explode(',', $aboutus->counter_text ?? '');
                $descriptions = explode(',', $aboutus->counter_description ?? '');
                $count = max(count($texts), count($descriptions));
            @endphp

            @for ($i = 0; $i < $count; $i++)
                <div class="row mb-2 counter-group">
                    <div class="col-md-5">
                        <input type="text" name="counter_text[]" class="form-control" placeholder="Enter counter text" value="{{ $texts[$i] ?? '' }}">
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="counter_description[]" class="form-control" placeholder="Enter counter description" value="{{ $descriptions[$i] ?? '' }}">
                    </div>
                    <div class="col-md-2">
                        @if ($i === 0)
                            <button type="button" class="btn btn-success add-counter">+</button>
                        @else
                            <button type="button" class="btn btn-danger remove-counter">-</button>
                        @endif
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>


                            <div class="mt-4 text-end">
                                <a href="{{ route('aboutus-details-platina.index') }}" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update</button>
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

<script>
    function previewImage(input) {
        const preview = document.getElementById('banner_image_preview');
        const container = document.getElementById('bannerImagePreviewContainer');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                container.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
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
