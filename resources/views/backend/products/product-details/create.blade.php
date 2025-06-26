<!doctype html>
<html lang="en">
    
<head>
    @include('components.backend.head')
</head>
	   
		@include('components.backend.header')

	    <!--start sidebar wrapper-->	
	    @include('components.backend.sidebar')
	   <!--end sidebar wrapper-->


        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Add  Products Details Form</h4>
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
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                        <h4> Products Details Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('product-details.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Product Category -->
    <div class="col-xxl-4 col-sm-6">
        <label class="form-label">Product Category<span class="text-danger">*</span></label>
        <select name="product_category_id" class="form-control" required>
            <option value="">Select Category</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
            @endforeach
        </select>
    </div>

 <!-- Product sab Category -->
    <div class="col-xxl-4 col-sm-6">
        <label class="form-label">Product Category<span class="text-danger">*</span></label>
        <select name="product_sab_category_id" class="form-control" required>
            <option value="">Select Sab Category</option>
            @foreach($subcategories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->sab_category_name }}</option>
            @endforeach
        </select>
    </div>
    <!-- Product Name -->
    <div class="col-xxl-4 col-sm-6">
        <label class="form-label">Product Name<span class="text-danger">*</span></label>
        <input type="text" name="product_name" placeholder="Enter a Product Name" class="form-control" required>
    </div>

    <!-- TC Name -->
    <div class="col-xxl-4 col-sm-6">
        <label class="form-label">TC Name<span class="text-danger">*</span></label>
        <input type="text" name="tc_name" placeholder="Enter a TC Name" class="form-control">
    </div>

    <!-- Age Group -->
    <div class="col-xxl-4 col-sm-6">
        <label class="form-label">Age Group<span class="text-danger">*</span></label>
        <select name="age_group_id" class="form-control" required>
            <option value="">Select Age Group</option>
            @foreach($age_groups as $ag)
                <option value="{{ $ag->id }}">{{ $ag->category_name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Fabric Type -->
    <div class="col-xxl-4 col-sm-6">
        <label class="form-label">Fabric Type<span class="text-danger">*</span></label>
        <select name="fabric_type_id" class="form-control" required>
            <option value="">Select Fabric Type</option>
            @foreach($fabric_types as $ft)
                <option value="{{ $ft->id }}">{{ $ft->category_name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Size -->
    <div class="col-xxl-4 col-sm-6">
        <label class="form-label">Size<span class="text-danger">*</span></label>
        <select name="size_id" class="form-control" required>
            <option value="">Select Size</option>
            @foreach($sizes as $sz)
                <option value="{{ $sz->id }}">{{ $sz->category_name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Colors -->
                                <div class="col-xxl-4 col-sm-6">
                                        <label class="form-label" for="product_colors">Product Colors</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="color_dropdown" name="colors[]" multiple>
                                                <option value="Black">Black</option>
                                              <option value="Ice Melt">Ice Melt</option>
                                              <option value="Spell Bound">Spell Bound	</option>
                                                <option value="White">White</option>
                                                <option value="Red">Red</option>
                                                <option value="Green">Green</option>
                                                <option value="Blue">Blue</option>
                                                <option value="Yellow">Yellow</option>
                                                <option value="Orange">Orange</option>
                                                <option value="Purple">Purple</option>
                                                <option value="Pink">Pink</option>
                                                <option value="Brown">Brown</option>
                                                <option value="Gray">Gray</option>
                                                <option value="Cyan">Cyan</option>
                                                <option value="Dark Green">Dark Green</option>
                                                <option value="Maroon">Maroon</option>
                                                <option value="Teal">Teal</option>
                                            </select>
                                        </div>
                                    </div>

    <!-- Dimension -->
    <div class="col-xxl-4 col-sm-6">
        <label class="form-label">Dimension<span class="text-danger">*</span></label>
        <input type="text" name="dimension" placeholder="Enter a Dimension" class="form-control">
    </div>
<!-- Collection -->
    <div class="col-xxl-4 col-sm-6">
        <label class="form-label">Collection Name<span class="text-danger">*</span></label>
        <input type="text" name="collection" placeholder="Enter a collection" class="form-control">
    </div>
    <!-- Product Content -->
    <div class="col-xxl-4 col-sm-6">
        <label class="form-label">Product Content<span class="text-danger">*</span></label>
        <select name="product_content_id" class="form-control" required>
            <option value="">Select Content</option>
            @foreach($contents as $pc)
                <option value="{{ $pc->id }}">{{ $pc->category_name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Style No -->
    <div class="col-xxl-4 col-sm-6">
        <label class="form-label">Style No<span class="text-danger">*</span></label>
        <input type="text" name="style_no" placeholder="Enter a Style No" class="form-control">
    </div>


    <!-- shipping -->
<div class="col-xxl-4 col-sm-6">
    <label class="form-label">Shipping Fees & Timelines<span class="text-danger">*</span></label>
    <textarea id="shipping_summernote" name="shipping" placeholder="Enter a Shipping Fees" class="form-control">{{ old('shipping', $product->shipping ?? '') }}</textarea>
</div>

<!-- return exchange -->
<div class="col-xxl-4 col-sm-6">
    <label class="form-label">Return & Exchange<span class="text-danger">*</span></label>
    <textarea id="return_summernote" name="return_exchange" placeholder="Enter a Return & Exchange" class="form-control">{{ old('return_exchange', $product->return_exchange ?? '') }}</textarea>
</div>

    <!-- MRP -->
    <div class="col-xxl-4 col-sm-6">
        <label class="form-label">MRP<span class="text-danger">*</span></label>
        <input type="text" name="mrp" placeholder="Enter a MRP" class="form-control">
    </div>

    <!-- Description -->
    <div class="col-xxl-4 col-sm-6">
        <label class="form-label">Description<span class="text-danger">*</span></label>
        <textarea name="description" placeholder="Enter a Description" class="form-control"></textarea>
    </div>
    <!-- Thumbnail Image Upload -->
                                    <div class="table-container" style="margin-bottom: 20px;">
                                        <h5 class="mb-4"><strong>Thumbnail Image Upload</strong></h5>
                                        <table class="table table-bordered p-3" id="dynamicTable" style="border: 2px solid #dee2e6;">
                                            <thead>
                                                <tr>
                                                    <th>Uploaded Thumbnail Image: <span class="text-danger">*</span></th>
                                                    <th>Preview</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="file" onchange="previewThumbnail(this, 0)" accept=".png, .jpg, .jpeg, .webp" name="thumbnail_image[]" id="thumbnail_image_0" class="form-control" placeholder="Upload Thumbnail Image" multiple required>
                                                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                        <br>
                                                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                                    </td>
                                                    <td>
                                                        <div id="preview-container-0"></div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" id="addRow">Add More</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
    <!-- Images / Videos -->
<div class="col-xxl-4 col-sm-6">
    <label class="form-label">Photos / Videos <span class="text-danger">*</span></label>
    <input type="file" name="media_files[]" id="media_files" class="form-control" multiple accept=".webp,.png,.jpeg,.jpg,.mp4,.mp3" required>
    <small class="text-muted">Choose images/videos to upload</small>
    <div id="media_preview" class="mt-2 d-flex flex-wrap gap-2"></div>
</div>


    <!-- Form Actions -->
    <div class="col-12 text-end">
        <a href="{{ route('product-details.index') }}" class="btn btn-danger px-4">Cancel</a>
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>
</form>

                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

          </div>
        </div>
        <!-- footer start-->
        @include('components.backend.footer')
        </div>
        </div>


       
       @include('components.backend.main-js')
        <!-- Include Select2 CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
        <!-- Include Select2 JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
       <!--Product Color select 2 opt-->  
       <!--Thumbnail Add More Option-->
<script>
    $(document).ready(function () {
        let rowId = 0;
        $('#addRow').click(function () {
            rowId++;
            const newRow = `
                <tr>
                    <td>
                        <input type="file" onchange="previewThumbnail(this, ${rowId})" accept=".png, .jpg, .jpeg, .webp" name="thumbnail_image[]" id="thumbnail_image${rowId}" class="form-control" placeholder="Upload thumbnail Image">
                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                        <br>
                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                    </td>
                    <td>
                        <div id="preview-container-${rowId}"></div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger removeRow">Remove</button>
                    </td>
                </tr>`;
            $('#dynamicTable tbody').append(newRow);
        });

        // Remove a row
        $(document).on('click', '.removeRow', function () {
            $(this).closest('tr').remove();
        });
    });

    // Preview function for thumbnail images
    function previewThumbnail(input, rowId) {
        const file = input.files[0];
        const previewContainer = document.getElementById(`preview-container-${rowId}`);

        // Clear previous preview
        previewContainer.innerHTML = '';

        if (file) {
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];

            if (validImageTypes.includes(file.type)) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    // Create an image element for preview
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '120px';
                    img.style.maxHeight = '100px';
                    img.style.objectFit = 'cover';

                    previewContainer.appendChild(img);
                };

                reader.readAsDataURL(file);
            } else {
                previewContainer.innerHTML = '<p>Unsupported file type</p>';
            }
        }
    }
</script>
       <script>
$(document).ready(function () {
    const mediaInput = $('#media_files');
    const previewContainer = $('#media_preview');

    mediaInput.on('change', function () {
        previewContainer.empty(); // Clear previous previews

        Array.from(this.files).forEach((file, index) => {
            const fileReader = new FileReader();

            fileReader.onload = function (e) {
                let previewElement;

                if (file.type.startsWith('image/')) {
                    previewElement = $(
                        `<div style="position: relative; display: inline-block;">
                            <img src="${e.target.result}" style="width: 100px; height: 100px; object-fit: cover; border: 1px solid #ddd; border-radius: 5px;">
                            <span class="remove-media" style="position: absolute; top: -6px; right: -6px; background: red; color: white; border-radius: 50%; width: 18px; height: 18px; font-size: 12px; text-align: center; line-height: 18px; cursor: pointer;">×</span>
                        </div>`
                    );
                } else if (file.type.startsWith('video/')) {
                    previewElement = $(
                        `<div style="position: relative; display: inline-block;">
                            <video src="${e.target.result}" style="width: 100px; height: 100px; border: 1px solid #ddd; border-radius: 5px;" controls></video>
                            <span class="remove-media" style="position: absolute; top: -6px; right: -6px; background: red; color: white; border-radius: 50%; width: 18px; height: 18px; font-size: 12px; text-align: center; line-height: 18px; cursor: pointer;">×</span>
                        </div>`
                    );
                }

                previewContainer.append(previewElement);

                // Attach delete handler
                previewElement.find('.remove-media').click(function () {
                    // Remove preview
                    previewElement.remove();

                    // Remove file from input
                    const dt = new DataTransfer();
                    Array.from(mediaInput[0].files).forEach((f, i) => {
                        if (i !== index) dt.items.add(f);
                    });
                    mediaInput[0].files = dt.files;
                });
            };

            fileReader.readAsDataURL(file);
        });
    });
});
</script>

<!--Product Color select 2 opt-->  
<script>
    $(document).ready(function() {
   
    $('#summernotes').summernote({
        height: 200
    });
});
   $(document).ready(function () {
    const colorDropdown = $('#color_dropdown');

    // Map color names to their respective hex values
    const colorMap = {
        "Black": "#000000",
         "Ice Melt": "#D3E4F1",
      "Spell Bound": "#4E646F",
        "White": "#FFFFFF",
        "Red": "#FF0000",
        "Green": "#00FF00",
        "Blue": "#0000FF",
        "Yellow": "#FFFF00",
        "Orange": "#FFA500",
        "Purple": "#800080",
        "Pink": "#FFC0CB",
        "Brown": "#A52A2A",
        "Gray": "#808080",
        "Cyan": "#00FFFF",
        "Dark Green": "#008000",
        "Maroon": "#800000",
        "Teal": "#006666"
    };

    // Initialize Select2 with color swatches
    colorDropdown.select2({
        placeholder: "Select Colors",
        allowClear: true,
        templateResult: formatColorOption,
        templateSelection: formatColorOption
    });

    // Format options to display color swatches
    function formatColorOption(option) {
        if (!option.id) return option.text; // Handle placeholder
        const colorHex = colorMap[option.id] || "#ccc"; // Fallback for unknown colors
        return $(
            `<span style="display: inline-flex; align-items: center;">
                <span style="display: inline-block; width: 20px; height: 20px; background-color: ${colorHex}; margin-right: 8px; border-radius: 3px; border: 1px solid #ccc;"></span>
                ${option.text}
            </span>`
        );
    }
    });
$(document).ready(function() {
    $('#shipping_summernote').summernote({
        height: 200
    });
    $('#return_summernote').summernote({
        height: 200
    });
});

</script>

</body>

</html>