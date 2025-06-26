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
                        <h4>{{ isset($record) ? 'Edit' : 'Add' }} About Hayagreevas Details</h4>
                    </div>
                    <div class="col-6 text-end">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{ route('manage-about-hayagreevas.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{ isset($record) ? 'Edit' : 'Add' }} About Hayagreevas Details</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Form Start -->
            <form action="{{ isset($record) ? route('manage-about-hayagreevas.update', $record->id) : route('manage-about-hayagreevas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($record)) @method('PUT') @endif

                <div class="card">
                    <div class="card-body row g-3">
                        <!-- Banner Image -->
                        <div class="col-md-6">
                            <label>Banner Image</label>
                            <input type="file" name="banner_image" class="form-control" onchange="previewImage('bannerPreview', event)">
                            <img id="bannerPreview" src="{{ isset($record) && $record->banner_image ? asset('uploads/about_hayagreevas/' . $record->banner_image) : '' }}" class="mt-2" style="max-height: 100px; {{ isset($record) && $record->banner_image ? '' : 'display:none;' }}">
                        </div>

                        <!-- Content Image -->
                        <div class="col-md-6">
                            <label>Content Image</label>
                            <input type="file" name="content_image" class="form-control" onchange="previewImage('contentPreview', event)">
                            <img id="contentPreview" src="{{ isset($record) && $record->content_image ? asset('uploads/about_hayagreevas/' . $record->content_image) : '' }}" class="mt-2" style="max-height: 100px; {{ isset($record) && $record->content_image ? '' : 'display:none;' }}">
                        </div>

                        <!-- Title -->
                        <div class="col-md-6">
                            <label>Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $record->title ?? '') }}" required>
                        </div>

                        <!-- Content Heading -->
                        <div class="col-md-6">
                            <label>Content Heading <span class="text-danger">*</span></label>
                            <input type="text" name="content_heading" class="form-control" value="{{ old('content_heading', $record->content_heading ?? '') }}" required>
                        </div>

                        <!-- Description -->
                        <div class="col-md-12">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="summernote_description" class="form-control" rows="4" required>{{ old('description', $record->description ?? '') }}</textarea>
                        </div>

                        <!-- Description Content -->
                        <div class="col-md-12">
                            <label>Description Content <span class="text-danger">*</span></label>
                            <textarea name="description_content" id="summernote_content" class="form-control" rows="4" required>{{ old('description_content', $record->description_content ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="text-end mt-3">
                    <a href="{{ route('manage-about-hayagreevas.index') }}" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">{{ isset($record) ? 'Update' : 'Submit' }}</button>
                </div>
            </form>

        </div>
    </div>

    @include('components.backend.footer')
    @include('components.backend.main-js')

    <!-- Scripts -->
    <script>
        function previewImage(id, event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById(id);
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        $(document).ready(function () {
            $('#summernote_description').summernote({ height: 200 });
            $('#summernote_content').summernote({ height: 200 });
        });
    </script>
</body>
</html>
