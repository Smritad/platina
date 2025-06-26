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
                    <h4>Add Products Details Form</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('product-details.index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Add Products Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Products Details Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('product-details.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-xxl-4 col-sm-6">
                                <label class="form-label">Product Category <span class="text-danger">*</span></label>
                                <select name="product_category_id" class="form-control" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $product->product_category_id == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->category_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xxl-4 col-sm-6">
                                <label class="form-label">Product Sub Category <span class="text-danger">*</span></label>
                                <select name="product_sab_category_id" class="form-control" required>
                                    <option value="">Select Sub Category</option>
                                    @foreach($subcategories as $cat)
                                    <option value="{{ $cat->id }}" {{ $product->product_sab_category_id == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->sab_category_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xxl-4 col-sm-6">
                                <label class="form-label">Product Name <span class="text-danger">*</span></label>
                                <input type="text" name="product_name" value="{{ old('product_name', $product->product_name) }}" class="form-control" required placeholder="Enter a Product Name">
                            </div>

                            <div class="col-xxl-4 col-sm-6">
                                <label class="form-label">TC Name</label>
                                <input type="text" name="tc_name" value="{{ old('tc_name', $product->tc_name) }}" class="form-control" placeholder="Enter a TC Name">
                            </div>

                            <div class="col-xxl-4 col-sm-6">
                                <label class="form-label">Age Group <span class="text-danger">*</span></label>
                                <select name="age_group_id" class="form-control" required>
                                    <option value="">Select Age Group</option>
                                    @foreach($age_groups as $ag)
                                    <option value="{{ $ag->id }}" {{ $product->age_group_id == $ag->id ? 'selected' : '' }}>
                                        {{ $ag->category_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xxl-4 col-sm-6">
                                <label class="form-label">Fabric Type <span class="text-danger">*</span></label>
                                <select name="fabric_type_id" class="form-control" required>
                                    <option value="">Select Fabric Type</option>
                                    @foreach($fabric_types as $ft)
                                    <option value="{{ $ft->id }}" {{ $product->fabric_type_id == $ft->id ? 'selected' : '' }}>
                                        {{ $ft->category_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xxl-4 col-sm-6">
                                <label class="form-label">Size <span class="text-danger">*</span></label>
                                <select name="size_id" class="form-control" required>
                                    <option value="">Select Size</option>
                                    @foreach($sizes as $sz)
                                    <option value="{{ $sz->id }}" {{ $product->size_id == $sz->id ? 'selected' : '' }}>
                                        {{ $sz->category_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xxl-4 col-sm-6">
                                <label class="form-label">Product Colors</label>
                                <select class="form-control" name="colors[]" id="color_dropdown" multiple>
                                    @php $selectedColors = explode(',', $product->colors); @endphp
                                    @foreach(['Black','White','Red','Green','Blue','Yellow','Orange','Purple','Pink','Brown','Gray','Cyan','Dark Green','Maroon','Teal'] as $color)
                                    <option value="{{ $color }}" {{ in_array($color, $selectedColors) ? 'selected' : '' }}>
                                        {{ $color }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xxl-4 col-sm-6">
                                <label class="form-label">Dimension</label>
                                <input type="text" name="dimension" value="{{ old('dimension', $product->dimension) }}" class="form-control" placeholder="Enter a Dimension">
                            </div>
                    <!-- Collection -->
                        <div class="col-xxl-4 col-sm-6">
                            <label class="form-label">Collection Name<span class="text-danger">*</span></label>
                            <input type="text" name="collection" value="{{ old('dimension', $product->collection) }}" class="form-control">
                        </div>
                            <div class="col-xxl-4 col-sm-6">
                                <label class="form-label">Product Content <span class="text-danger">*</span></label>
                                <select name="product_content_id" class="form-control" required>
                                    <option value="">Select Content</option>
                                    @foreach($contents as $pc)
                                    <option value="{{ $pc->id }}" {{ $product->product_content_id == $pc->id ? 'selected' : '' }}>
                                        {{ $pc->category_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xxl-4 col-sm-6">
                                <label class="form-label">Style No</label>
                                <input type="text" name="style_no" value="{{ old('style_no', $product->style_no) }}" class="form-control" placeholder="Enter a Style No">
                            </div>
<!-- shipping -->
<div class="col-xxl-4 col-sm-6">
    <label class="form-label">Shipping Fees & Timelines<span class="text-danger">*</span></label>
    <textarea id="summernote" name="shipping" placeholder="Enter a Shipping Fees" class="form-control">{{ old('shipping', $product->shipping) }}</textarea>
</div>

<!-- return exchange -->
<div class="col-xxl-4 col-sm-6">
    <label class="form-label">Return & Exchange<span class="text-danger">*</span></label>
    <textarea id="summernotes" name="return_exchange" placeholder="Enter a Return & Exchange" class="form-control">{{ old('return_exchange', $product->return_exchange) }}</textarea>
</div>


                            <div class="col-xxl-4 col-sm-6">
                                <label class="form-label">MRP</label>
                                <input type="text" name="mrp" value="{{ old('mrp', $product->mrp) }}" class="form-control" placeholder="Enter a MRP">
                            </div>

                            <div class="col-xxl-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" placeholder="Enter a Description">{{ old('description', $product->description) }}</textarea>
                            </div>
<!-- Thumbnail Image Upload -->
<div class="table-container mb-4">
    <h5><strong>Thumbnail Image Upload</strong></h5>
    <table class="table table-bordered" id="dynamicTable">
        <thead>
            <tr>
                <th>Upload Thumbnail <span class="text-danger">*</span></th>
                <th>Preview</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $thumbnailImages = json_decode($product->thumbnail_image ?? '[]');
                $rowId = 0;
            @endphp

            @foreach($thumbnailImages as $image)
                <tr>
                    <td>
                        <input type="file" onchange="previewThumbnail(this, {{ $rowId }})" accept=".jpg,.jpeg,.png,.webp" name="thumbnail_image[]" class="form-control">
                        <small class="text-secondary">Max 2MB. Allowed: jpg, jpeg, png, webp</small>
                    </td>
                    <td>
                        <div id="preview-container-{{ $rowId }}">
                            <img src="{{ asset('uploads/products/thumbnails/' . $image) }}" style="max-width:120px; max-height:100px; object-fit:cover; border:1px solid #ddd; border-radius:4px;">
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger removeRow">Remove</button>
                    </td>
                </tr>
                @php $rowId++; @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">
                    <button type="button" class="btn btn-primary" id="addRow">Add More</button>
                </td>
            </tr>
        </tfoot>
    </table>
    <!-- ✅ This is the only hidden input we need -->
    <input type="hidden" name="removed_thumbnails" id="removed_thumbnails">
</div>



<!-- Media Files Upload -->
<div class="col-xxl-12 mb-3">
    <label class="form-label">Photos / Videos</label>
    <input type="file" name="media_files[]" class="form-control" multiple accept=".webp,.png,.jpeg,.jpg,.mp4,.mp3">
    <small class="text-muted">Upload new files (optional)</small>
    <input type="hidden" name="removed_media_files" id="removed_media_files">

    <div id="existing_media_preview" class="mt-2 d-flex flex-wrap gap-2">
        @php
            $media_files = json_decode($product->media_files ?? '[]');
        @endphp
        @foreach($media_files as $media)
            <div class="position-relative" style="margin:4px;">
                @if(Str::endsWith($media, ['.jpg', '.jpeg', '.png', '.webp']))
                    <img src="{{ asset('uploads/products/media/' . $media) }}" style="width:100px; height:100px; object-fit:cover; border:1px solid #ddd; border-radius:5px;">
                @elseif(Str::endsWith($media, '.mp4'))
                    <video src="{{ asset('uploads/products/media/' . $media) }}" style="width:100px; height:100px; border:1px solid #ddd; border-radius:5px;" controls></video>
                @endif
                <span class="remove-existing-media" data-file="{{ $media }}" style="position:absolute; top:-6px; right:-6px; background:red; color:white; border-radius:50%; width:18px; height:18px; text-align:center; cursor:pointer;">×</span>
            </div>
        @endforeach
    </div>
</div>

                            <div class="col-12 text-end">
                                <a href="{{ route('product-details.index') }}" class="btn btn-danger px-4">Cancel</a>
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.backend.footer')
@include('components.backend.main-js')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
$(document).ready(function () {
    let rowId = {{ count(json_decode($product->thumbnail_image ?? '[]')) }};

    // Add new row
    $('#addRow').click(function () {
        rowId++;
        const newRow = `
            <tr>
                <td>
                    <input type="file" onchange="previewThumbnail(this, ${rowId})" accept=".jpg,.jpeg,.png,.webp" name="thumbnail_image[]" class="form-control">
                    <small class="text-secondary">Max 2MB. Allowed: jpg, jpeg, png, webp</small>
                </td>
                <td><div id="preview-container-${rowId}"></div></td>
                <td><button type="button" class="btn btn-danger removeRow">Remove</button></td>
            </tr>`;
        $('#dynamicTable tbody').append(newRow);
    });

    // Remove row
    $(document).on('click', '.removeRow', function () {
        const row = $(this).closest('tr');
        const imgSrc = row.find('img').attr('src');

        if (imgSrc && imgSrc.includes('uploads/products/thumbnails')) {
            const filename = imgSrc.split('/').pop();
            let removedThumbs = $('#removed_thumbnails').val();
            let removedArray = removedThumbs ? JSON.parse(removedThumbs) : [];
            removedArray.push(filename);
            $('#removed_thumbnails').val(JSON.stringify(removedArray));
        }

        row.remove();
    });
});

// Thumbnail preview
function previewThumbnail(input, rowId) {
    const file = input.files[0];
    const previewContainer = document.getElementById(`preview-container-${rowId}`);
    previewContainer.innerHTML = '';

    if (file) {
        const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
        if (validTypes.includes(file.type)) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewContainer.innerHTML = `
                    <img src="${e.target.result}" 
                        style="max-width:120px; max-height:100px; object-fit:cover; border:1px solid #ddd; border-radius:4px;">`;
            };
            reader.readAsDataURL(file);
        } else {
            previewContainer.innerHTML = '<p class="text-danger">Unsupported file type</p>';
        }
    }
}

</script>


<script>
$(document).ready(function () {
    const mediaInput = $('input[name="media_files[]"]');
    const previewContainer = $('#media_preview');
    const removeMediaInput = $('#removed_media_files'); // ✅ correct ID
    const existingMediaContainer = $('#existing_media_preview');
    let removedFiles = [];

    // Handle existing media remove
    existingMediaContainer.on('click', '.remove-existing-media', function () {
        const fileName = $(this).data('file');
        removedFiles.push(fileName);
        removeMediaInput.val(JSON.stringify(removedFiles)); // ✅ this will now work
        $(this).parent().remove();
    });

    // Handle new uploads preview + removal
    mediaInput.on('change', function () {
        previewContainer.empty();
        const dt = new DataTransfer();

        Array.from(this.files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                let el;
                if (file.type.startsWith('image/')) {
                    el = $(`<div style="position:relative; display:inline-block; margin:4px;">
                        <img src="${e.target.result}" style="width:100px;height:100px;object-fit:cover;border-radius:5px;border:1px solid #ddd;">
                        <span class="remove-media" data-index="${index}" style="position:absolute;top:-6px;right:-6px;background:red;color:white;border-radius:50%;width:18px;height:18px;font-size:12px;text-align:center;line-height:18px;cursor:pointer;">×</span>
                    </div>`);
                } else if (file.type.startsWith('video/')) {
                    el = $(`<div style="position:relative; display:inline-block; margin:4px;">
                        <video src="${e.target.result}" style="width:100px;height:100px;border-radius:5px;border:1px solid #ddd;" controls></video>
                        <span class="remove-media" data-index="${index}" style="position:absolute;top:-6px;right:-6px;background:red;color:white;border-radius:50%;width:18px;height:18px;font-size:12px;text-align:center;line-height:18px;cursor:pointer;">×</span>
                    </div>`);
                }

                previewContainer.append(el);

                el.find('.remove-media').click(function () {
                    const rmIndex = $(this).data('index');
                    const newDt = new DataTransfer();
                    Array.from(mediaInput[0].files).forEach((f, i) => {
                        if (i !== rmIndex) newDt.items.add(f);
                    });
                    mediaInput[0].files = newDt.files;
                    $(this).parent().remove();
                });
            };
            reader.readAsDataURL(file);
            dt.items.add(file);
        });

        mediaInput[0].files = dt.files;
    });
});
$(document).ready(function() {
   
    $('#summernotes').summernote({
        height: 200
    });
});
</script>


</body>
</html>
