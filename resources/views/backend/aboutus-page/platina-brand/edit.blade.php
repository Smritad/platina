<!doctype html>
<html lang="en">
<head>
    @include('components.backend.head')
    <style>
        .image-preview-wrapper {
            position: relative;
            display: inline-block;
        }
        .remove-image {
            position: absolute;
            top: 5px;
            right: 5px;
            border: none;
            background: rgba(255, 0, 0, 0.8);
            color: white;
            font-size: 16px;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 20px;
            cursor: pointer;
        }
    </style>
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
                        <h4>{{ isset($record) ? 'Edit' : 'Add' }} Platina Brand Details</h4>
                    </div>
                    <div class="col-6 text-end">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{ route('platina-brand.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{ isset($record) ? 'Edit' : 'Add' }} Platina Brand Details</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Form Start -->
            <form action="{{ isset($record) ? route('platina-brand.update', $record->id) : route('platina-brand.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($record)) @method('PUT') @endif

                <div class="row g-3">
                    <!-- Title -->
                    <div class="col-md-6">
                        <label>Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" placeholder="Enter title *"
                               value="{{ old('title', $record->title ?? '') }}">
                    </div>

                    <!-- Banner Image -->
                    <div class="col-md-6">
                        <label>Banner Image <span class="text-danger">*</span></label>
                        <input type="file" name="banner_image" class="form-control" accept="image/*" id="banner_image">
                        @if(!empty($record->banner_image))
                            <img id="preview_banner" src="{{ asset('uploads/platina_brand/' . $record->banner_image) }}" class="img-thumbnail mt-2" style="height:100px;">
                        @else
                            <img id="preview_banner" class="img-thumbnail mt-2" style="height:100px; display:none;">
                        @endif
                    </div>

                    <!-- Description -->
                    <div class="col-md-12">
                        <label>Description <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Enter description *">{{ old('description', $record->description ?? '') }}</textarea>
                    </div>

                    <!-- Content Heading -->
                    <div class="col-md-12">
                        <label>Content Heading <span class="text-danger">*</span></label>
                        <input type="text" name="content_heading" class="form-control" placeholder="Enter content heading *"
                               value="{{ old('content_heading', $record->content_heading ?? '') }}">
                    </div>

                    <!-- Content Heading Descriptions -->
                    <div class="col-md-12" id="content_heading_description_wrapper">
                        <label>Content Heading Descriptions <span class="text-danger">*</span></label>
                        <div class="text-end">
    <button type="button" class="btn btn-success btn-sm mt-1" id="add_description" title="Add Description">
        <i class="fa fa-plus"></i>
    </button>
</div>
<br>

                        @php
                            $descriptions = old('content_heading_descriptions', isset($record) ? explode(',', $record->content_heading_descriptions) : []);
                        @endphp
                        @foreach($descriptions as $index => $desc)
                            <div class="col-md-12 mb-2 d-flex">
                                <input type="text" name="content_heading_descriptions[]" class="form-control me-2" value="{{ $desc }}" placeholder="Enter description *">
                                <button type="button" class="btn btn-danger remove-desc">Remove</button>
                            </div>
                        @endforeach
    </div>


                    <!-- Extra Images -->
                    <div class="col-md-12">
                        <label>Extra Images <span class="text-danger">*</span></label>
                        <input type="file" name="extra_images[]" class="form-control" accept="image/*" multiple id="extra_image">
                        <div class="row mt-2" id="preview_extra_container">
                            @if(!empty($record->extra_image))
                                @foreach(explode(',', $record->extra_image) as $index => $img)
                                    <div class="col-md-3 mb-2 image-preview-wrapper existing-image" data-index="{{ $index }}">
                                        <img src="{{ asset('uploads/platina_brand/' . $img) }}" class="img-thumbnail w-100" style="height:100px;">
                                        <input type="hidden" name="existing_extra_images[]" value="{{ $img }}">
                                        <button type="button" class="remove-image">&times;</button>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- Content Image -->
                    <div class="col-md-6">
                        <label>Content Image <span class="text-danger">*</span></label>
                        <input type="file" name="content_image" class="form-control" accept="image/*" id="content_image">
                        @if(!empty($record->content_image))
                            <img id="preview_content" src="{{ asset('uploads/platina_brand/' . $record->content_image) }}" class="img-thumbnail mt-2" style="height:100px;">
                        @else
                            <img id="preview_content" class="img-thumbnail mt-2" style="height:100px; display:none;">
                        @endif
                    </div>

                    <!-- Content Description -->
                    <div class="col-md-12">
                        <label>Content Description <span class="text-danger">*</span></label>
                        <textarea name="content_description" class="form-control" rows="3" placeholder="Enter content description *">{{ old('content_description', $record->content_description ?? '') }}</textarea>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="text-end mt-3">
                    <a href="{{ route('platina-brand.index') }}" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">{{ isset($record) ? 'Update' : 'Submit' }}</button>
                </div>
            </form>
        </div>
    </div>

    @include('components.backend.footer')
    @include('components.backend.main-js')

    <!-- JavaScript -->
    <script>
        document.getElementById('add_description').addEventListener('click', function () {
            const wrapper = document.getElementById('content_heading_description_wrapper');
            const div = document.createElement('div');
            div.classList.add('col-md-12', 'mb-2', 'd-flex');
            div.innerHTML = `
                <input type="text" name="content_heading_descriptions[]" class="form-control me-2" placeholder="Enter description *">
                <button type="button" class="btn btn-danger remove-desc">Remove</button>
            `;
            wrapper.appendChild(div);
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-desc')) {
                e.target.closest('.d-flex').remove();
            }
            if (e.target.classList.contains('remove-image')) {
                e.target.closest('.image-preview-wrapper').remove();
            }
        });

        // Extra Images Preview
        document.getElementById('extra_image').addEventListener('change', function (e) {
            const container = document.getElementById('preview_extra_container');
            Array.from(e.target.files).forEach((file) => {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const div = document.createElement('div');
                    div.classList.add('col-md-3', 'mb-2', 'image-preview-wrapper');
                    div.innerHTML = `
                        <img src="${e.target.result}" class="img-thumbnail w-100" style="height:100px;">
                        <button type="button" class="remove-image">&times;</button>
                    `;
                    container.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        });

        // Preview single image fields
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
            previewImage('content_image', 'preview_content');
        });
    </script>
</body>
</html>
