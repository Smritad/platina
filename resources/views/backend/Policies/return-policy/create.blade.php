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
                        <h4>Add Return Policy Details</h4>
                    </div>
                    <div class="col-6 text-end">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{ route('manage-return-policy.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add Return Policy Details</li>
                        </ol>
                    </div>
                </div>
            </div>

        

    <form action="{{ isset($record) ? route('manage-return-policy.update', $record->id) : route('manage-return-policy.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($record)) @method('PUT') @endif

        <div class="card">
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $record->title ?? '') }}" required>
                </div>
                <div class="col-md-6">
                    <label>Banner Image</label>
                    <input type="file" name="banner_image" class="form-control" accept="image/*" onchange="previewBanner(event)">
                    @if(isset($record) && $record->banner_image)
                        <img id="bannerPreview" src="{{ asset('uploads/return_policy/' . $record->banner_image) }}" style="max-height:100px;" class="mt-2">
                    @else
                        <img id="bannerPreview" style="max-height:100px; display:none;" class="mt-2">
                    @endif
                </div>
                <div class="col-md-12">
                    <label>Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="summernote" class="form-control" rows="5">{{ old('description', $record->description ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="text-end mt-3">
            <a href="{{ route('manage-return-policy.index') }}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary">{{ isset($record) ? 'Update' : 'Submit' }}</button>
        </div>
    </form>
</div>




        </div>
    </div>

    @include('components.backend.footer')
    @include('components.backend.main-js')

   <script>
    function previewBanner(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById('bannerPreview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    $(document).ready(function () {
        $('#summernote').summernote({
            height: 200
        });
    });
</script>
</body>
</html>
