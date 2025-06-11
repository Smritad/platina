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
                    <h4>Add Team Leadership Details</h4>
                </div>
                <div class="col-6 text-end">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('team-leadership.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Team Leadership Details</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Form Start -->
        <form action="{{ route('team-leadership.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <div class="card-body row g-3">

                    <!-- Banner Image -->
                    <div class="col-md-6">
                        <label>Banner Image</label>
                        <input type="file" name="banner_image" class="form-control" onchange="previewImage('bannerPreview', event)">
                        <img id="bannerPreview" class="mt-2" style="max-height: 100px; display: none;">
                    </div>

                    <!-- Title -->
                    <div class="col-md-6">
                        <label>Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                    </div>

                    <!-- Description -->
                    <div class="col-md-12">
                        <label>Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="summernote_description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                    </div>

                    <!-- Description Content -->
                    <div class="col-md-12">
                        <label>Description Content <span class="text-danger">*</span></label>
                        <textarea name="description_content" id="summernote_content" class="form-control" rows="4" required>{{ old('description_content') }}</textarea>
                    </div>

                </div>
            </div>

            <!-- Team Members Section -->
            <div class="card mt-3">
                <div class="card-header">
                    <h5>Team Members</h5>
                    <button type="button" class="btn btn-sm btn-success float-end" onclick="addMember()">Add Member</button>
                </div>
                <div class="card-body" id="members-wrapper">
                    <!-- Dynamic team members will be added here -->
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="text-end mt-3">
                <a href="{{ route('team-leadership.index') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>
</div>

@include('components.backend.footer')
@include('components.backend.main-js')

<!-- Image Preview Script -->
<script>
    function previewImage(id, event) {
        const img = document.getElementById(id);
        img.src = URL.createObjectURL(event.target.files[0]);
        img.style.display = 'block';
    }
</script>

<!-- Dynamic Team Member Script -->
<script>
    function addMember() {
        const html = `
        <div class="member border p-3 mb-3 rounded">
            <div class="row g-2">
                <div class="col-md-2">
                    <label>Person Image</label>
                    <input type="file" name="person_image[]" class="form-control">
                </div>
                <div class="col-md-2">
                    <label>Name</label>
                    <input type="text" name="person_name[]" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label>Designation</label>
                    <input type="text" name="person_designation[]" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label>Description</label>
                    <input type="text" name="person_description[]" class="form-control">
                </div>
                <div class="col-md-2">
                    <label>Social Icons (comma-separated)</label>
                    <input type="text" name="social_icons[]" class="form-control">
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="button" class="btn btn-danger" onclick="this.closest('.member').remove()">X</button>
                </div>
            </div>
        </div>`;
        document.getElementById('members-wrapper').insertAdjacentHTML('beforeend', html);
    }
</script>

</body>
</html>
