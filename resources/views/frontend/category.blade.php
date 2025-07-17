
<!DOCTYPE html>
<html lang="en">

<head>
     @include('components.frontend.head')
</head>

<body>
  <!-- Loader -->
  <div class="rx-loader">
    <span class="loader"></span>
  </div>
  
  <!-- Header -->
     @include('components.frontend.header')

  <!-- Hero -->

  <!-- Breadcrumb -->
  <section class="section-breadcrumb padding-b-50">
    <div class="rx-breadcrumb-image">
      <div class="rx-breadcrumb-overlay"></div>
      <div class="inner-breadcrumb-contact">
        <div class="main-breadcrumb-contact">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="rx-banner-contact">
                 <h2>
                    {{ $masterCategoryName ?? $masterCategory->category_name }}
                </h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="rx-banner-breadcrumb">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="breadcrumb-contact">
                  
                  <div class="last-contact">
                    <ul>
                      <li>
                        <a href="{{route('frontend.index') }}">Home</a>
                      </li>
                      <li>
                          <a href="{{ route('product.category', \Illuminate\Support\Str::slug($masterCategoryName ?? $masterCategory->category_name)) }}">
                              {{ $masterCategoryName ?? $masterCategory->category_name }}
                          </a>
                      </li>

                      <!-- <li>About Hayagreevas</li> -->
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

 <section class="section-room padding-tb-50">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-3 col-sm-12 col-xs-12">
               <!-- Filter Button: visible on mobile/tablet only -->
           <div class="filter-btn-sec">
             <button id="filterBtn" class="rx-btn-two fitler-btn-two d-block d-lg-none">Filter</button>
           </div>

          <!-- Overlay -->
          <div id="sidebarOverlay" class="sidebar-overlay"></div>

          <!-- Sidebar: mobile view -->
          <div id="mobileSidebar" class="sidebar d-block d-lg-none">
            <div class="sidebar-header">
              <h4>Filter</h4>
              <button id="closeSidebar" class="close-btn">&times;</button>
            </div>
            <div class="sidebar-content">
              <div class="product-listing-side-bar-sec">
             <div class="sidebar-wrap" id="mobileFilterForm">
               <div class="single-sidebar-item">
                    <div class="single-sidebar-title">
                      <h4>Category</h4>
                    </div>
                    <div class="dropdown product-sub-cate-dropdown-sec">
                      <button class="btn custom-dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Bedding
                      </button>
                      <ul class="dropdown-menu custom-dropdown-menu">
                        <li><a class="dropdown-item" href="#">Bedding 1</a></li>
                        <li><a class="dropdown-item" href="#">Bedding 2</a></li>
                        <li><a class="dropdown-item" href="#">Bedding 3</a></li>
                      </ul>
                    </div>
                    <div class="dropdown product-sub-cate-dropdown-sec">
                      <button class="btn custom-dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Bedding
                      </button>
                      <ul class="dropdown-menu custom-dropdown-menu">
                        <li><a class="dropdown-item" href="#">Bedding 4</a></li>
                        <li><a class="dropdown-item" href="#">Bedding 5</a></li>
                        <li><a class="dropdown-item" href="#">Bedding 6</a></li>
                      </ul>
                    </div>
                    <div class="dropdown product-sub-cate-dropdown-sec">
                      <button class="btn custom-dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Bedding
                      </button>
                      <ul class="dropdown-menu custom-dropdown-menu">
                        <li><a class="dropdown-item" href="#">Bedding 7</a></li>
                        <li><a class="dropdown-item" href="#">Bedding 8</a></li>
                        <li><a class="dropdown-item" href="#">Bedding 9</a></li>
                      </ul>
                    </div>
                    </div>

                          <!-- TC -->
                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>TC</h4>
                            </div>
                            <select class="rx-from-control form-select" name="tc_name">
                                <option selected>Select</option>
                                @foreach($tcs as $tc)
                                    <option value="{{ $tc }}">{{ $tc }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Age Group -->
                       <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>Age Group</h4>
                            </div>
                            <select class="rx-from-control form-select" name="age_group">
                                <option selected>Select</option>
                                @foreach($ageGroups as $id => $ageGroup)
                                    <option value="{{ $ageGroup }}">{{ $ageGroup }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Collection -->
                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>Collection Name</h4>
                            </div>
                            <select class="rx-from-control form-select" name="collection_name">
                                <option selected>Select</option>
                                @foreach($collections as $collection)
                                    <option value="{{ $collection }}">{{ $collection }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Fabric Type -->
                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>Fabric Type</h4>
                            </div>
                            @foreach($fabricTypes as $id => $fabric)
                                <div class="form-check">
                                    <input class="fabric-type-check form-check-input" type="checkbox" value="{{ $id }}" id="check{{ $id }}">
                                    <label class="form-check-label" for="check{{ $id }}">
                                        {{ $fabric }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        
                        <!-- Color -->
                      <!-- Color -->
                      <div class="single-sidebar-item">
                          <div class="single-sidebar-title">
                              <h4>Select Color</h4>
                          </div>

                          <div class="dropdown">
                              <input type="text" id="colorSearchInputMobile" class="form-control" placeholder="Search color..." data-bs-toggle="dropdown" aria-expanded="false" autocomplete="off">
                              <ul class="dropdown-menu w-100 color-search-dropdown" id="colorSearchDropdownMobile">
                                  @foreach($uniqueColors as $color)
                                      <li><a class="dropdown-item color-option-mobile" href="#" data-color="{{ $color }}">{{ $color }}</a></li>
                                  @endforeach
                              </ul>
                          </div>

                          <div id="selectedColorDisplayMobile" class="mt-2"></div>
                      </div>


                       <!-- Size -->
                      <div class="single-sidebar-item">
                          <div class="single-sidebar-title">
                              <h4>Size</h4>
                          </div>
                          <ul class="list-inline">
                              @foreach($sizes as $id => $size)
                                  <li class="list-inline-item">
                                      <a href="#" class="size-btn">{{ $size }}</a>
                                  </li>
                              @endforeach
                          </ul>
                      </div>
                     

                          <!-- Price Range mobile-->
                          <div class="single-sidebar-item">
                              <div class="single-sidebar-title">
                                  <h4>Price</h4>
                              </div>
                              <div class="price-range-box">
                                  <div class="price-input">
                                      <div class="field">
                                          <label for="minPrice">Min</label>
                                          <input type="number" id="minPriceMobile" value="0">
                                      </div>
                                      <div class="field">
                                          <label for="maxPrice">Max</label>
                                         <input type="number" id="maxPriceMobile" value="0">
                                      </div>
                                  </div>
                                 <div class="slider">
                                          <div class="progress" id="progressMobile" style="left: 0%; right: 70%;"></div>
                                      </div>
                                  <div class="range-input">
                                     <input type="range" id="rangeMinMobile" min="0" max="100000" value="0" step="100">
                                      <input type="range" id="rangeMaxMobile" min="0" max="100000" value="0" step="100">
                                  </div>
                              </div>
                          </div>
                          
                         <div class="single-sidebar-item">
                            <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                        </div>

                        
                    </div>
                </div>
            </div>
          </div>


          
          <!-- -- Sidebar on desktop: visible only on desktop --> 

          <div class="product-listing-side-bar-sec d-none d-lg-block">
          <div class="sidebar-wrap" id="desktopFilterForm">
              <div class="single-sidebar-item">
                       <div class="single-sidebar-title">
                            <h4>Category</h4>
                        </div>

                      

                      </div>

                        <!-- TC -->
                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>TC</h4>
                            </div>
                            <select class="rx-from-control form-select" name="tc_name">
                                <option selected>Select</option>
                                @foreach($tcs as $tc)
                                    <option value="{{ $tc }}">{{ $tc }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>Age Group</h4>
                            </div>
                            <select name="age_group">
                            <option value="Select">Select</option>
                            @foreach($ageGroups as $id => $ageGroup)
                                <option value="{{ $id }}">{{ $ageGroup }}</option>
                            @endforeach
                        </select>
                        </div>

                        <!-- Collection -->
                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>Collection Name</h4>
                            </div>
                            <select class="rx-from-control form-select" name="collection_name">
                                <option selected>Select</option>
                                @foreach($collections as $collection)
                                    <option value="{{ $collection }}">{{ $collection }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Fabric Type -->
                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>Fabric Type</h4>
                            </div>
                            @foreach($fabricTypes as $id => $fabric)
                                <div class="form-check">
                                    <input class="fabric-type-check form-check-input" type="checkbox" value="{{ $id }}" id="check{{ $id }}">
                                    <label class="form-check-label" for="check{{ $id }}">
                                        {{ $fabric }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        
                        <!-- Color -->
                      <div class="single-sidebar-item">
                          <div class="single-sidebar-title">
                              <h4>Select Color</h4>
                          </div>

                          
                          <div class="dropdown">
                              <input type="text" id="colorSearchInput" class="form-control" placeholder="Search color..." data-bs-toggle="dropdown" aria-expanded="false" autocomplete="off">
                              <ul class="dropdown-menu w-100 color-search-dropdown" id="colorSearchDropdown">
                                  @foreach($uniqueColors as $color)
                                      <li><a class="dropdown-item color-option" href="#" data-color="{{ $color }}">{{ $color }}</a></li>
                                  @endforeach
                              </ul>
                          </div>

                          <!-- Selected colors shown here -->
                          <div id="selectedColorDisplay" class="mt-2"></div>
                      </div>

                       <!-- Size -->
                      <div class="single-sidebar-item">
                          <div class="single-sidebar-title">
                              <h4>Size</h4>
                          </div>
                          <ul class="list-inline">
    @foreach($sizes as $id => $size)
        <li class="list-inline-item">
            <a href="#" class="size-btn" data-size-id="{{ $id }}">{{ $size }}</a>
        </li>
    @endforeach
</ul>
                      </div>

                          <!-- Price Range desktop -->
                          <div class="single-sidebar-item">
                              <div class="single-sidebar-title">
                                  <h4>Price</h4>
                              </div>
                              <div class="price-range-box">
                                  <div class="price-input">
                                      <div class="field">
                                          <label for="minPrice">Min</label>
                                     <input type="number" id="minPriceDesktop" value="1000">
                                      </div>
                                      <div class="field">
                                          <label for="maxPrice">Max</label>
                                            <input type="number" id="maxPriceDesktop" value="5000">
                                      </div>
                                  </div>
                                 <div class="slider">
                                              <div class="progress" id="progressDesktop" style="left: 0%; right: 70%;"></div>
                                          </div>
                                  <div class="range-input">
                                     <input type="range" id="rangeMinDesktop" min="0" max="100000" value="0" step="100">
                                      <input type="range" id="rangeMaxDesktop" min="0" max="100000" value="30000" step="100">

                                  </div>
                              </div>
                          </div>


                         <div class="single-sidebar-item">
                            <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                        </div>
                      </div>
                    </div>
              </div>

          
           <div class="col-12 col-sm-9">
              <div class="product-listing-sec">
              <div class="row mb-minus-24 room-popup" id="productResults">
                @foreach($products as $product)
                    <?php
                        $images = json_decode($product->thumbnail_image ?? '[]');
                        $defaultImage = $images[0] ?? '';
                        $hoverImage = $images[1] ?? $defaultImage;
                        $fabricName = DB::table('fabric_type')->where('id', $product->fabric_type_id)->value('category_name');
                        $catSlug = DB::table('sub_product_category')->where('id', $product->product_sab_category_id)->value('slug');
                    ?>
                    <div class="col-lg-4 col-sm-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
                        <div class="product-main-box-sec">
                            <div class="product-box-front hover-image-wrap">
                                <a href="#">
                                    <img src="{{ asset('uploads/products/thumbnails/' . $defaultImage) }}" alt="{{ $product->product_name }}" class="img-default">
                                    <img src="{{ asset('uploads/products/thumbnails/' . $hoverImage) }}" alt="{{ $product->product_name }}" class="img-hover">
                                </a>
                                <div class="product-name-wrap">
                                    <a href="{{ route('product.categoryproduct', [$catSlug, $product->slug]) }}">
                                        <div class="product-inner-contact">
                                            <h4>{{ $product->product_name }}</h4>
                                            <h5 class="product-price">₹ {{ number_format($product->mrp) }}</h5>
                                            <h5 class="product-fabric">{{ $fabricName }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>



           </div>
    </div>
</section>



     @include('components.frontend.footer')    

  <!-- Back to top  -->
  <a href="#Top" class="back-to-top result-placeholder">
    <i class="fa fa-angle-up"></i>
    <div class="back-to-top-wrap active-progress">
      <svg viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
      </svg>
    </div>
  </a>
 
  <!-- Feature tools -->
  <div class="rx-tools-sidebar-overlay"></div>
 <div class="rx-tools-sidebar">
    <!-- <a href="javascript:void(0)" class="rx-tools-sidebar-toggle in-out">
      <i class="ri-settings-line"></i>
      </a> -->
    <div class="rx-inner-tools-sidebar">
      <div class="rx-bar-title">
        <h6>Tools</h6>
        <a href="javascript:void(0)" class="close-tools"><i class="ri-close-line"></i></a>
      </div>
      <div class="rx-tools-detail">
        <div class="rx-tools-block">
          <h3>Select Color</h3>
          <ul class="rx-color">
            <li class="color-primary active-color"></li>
            <li class="color-1"></li>
            <li class="color-2"></li>
            <li class="color-3"></li>
            <li class="color-4"></li>
            <li class="color-5"></li>
            <li class="color-6"></li>
            <li class="color-7"></li>
            <li class="color-8"></li>
            <li class="color-9"></li>
          </ul>
        </div>
        <div class="rx-tools-block">
          <h3>Modes</h3>
          <div class="rx-tools-rtl">
            <div class="mode-primary rx-tools-item mode active-mode ltr" data-rx-mode-tool="ltr">
              <img src="{{ asset('/frontend/assets/img/tools/ltr.png')}}" alt="ltr">
              <p>LTR</p>
            </div>
            <div class="mode-primary rx-tools-item mode rtl" data-rx-mode-tool="rtl">
              <img src="{{ asset('/frontend/assets/img/tools/rtl.png')}}" alt="rtl">
              <p>RTL</p>
            </div>
          </div>
        </div>
        <div class="rx-tools-block">
          <h3>Dark Modes</h3>
          <div class="rx-tools-dark">
            <div class="mode-primary rx-tools-item mode active-dark-mode light" data-rx-mode-tool="light">
              <img src="{{ asset('/frontend/assets/img/tools/light.png')}}" alt="light">
              <p>Light</p>
            </div>
            <div class="rx-tools-item mode dark" data-rx-mode-tool="dark">
              <img src="{{ asset('/frontend/assets/img/tools/dark.png')}}" alt="dark">
              <p>Dark</p>
            </div>
          </div>
        </div>
        <div class="rx-tools-block">
          <h3>Box Design</h3>
          <div class="rx-tools-box">
            <div class="rx-tools-item default active-box" data-bry-mode-tool="default">
              <img src="{{ asset('/frontend/assets/img/tools/box-0.png')}}" alt="box-0">
              <p>Default</p>
            </div>
            <div class="rx-tools-item box-1" data-bry-mode-tool="box-1">
              <img src="{{ asset('/frontend/assets/img/tools/box-1.png')}}" alt="box-1">
              <p>Box-1</p>
            </div>
          </div>
        </div>
        <div class="rx-tools-block">
          <h3>Backgrounds</h3>
          <div class="rx-tools-bg">
            <div class="rx-tools-item bg-0 active-bg">
              <img src="{{ asset('/frontend/assets/img/tools/bg-0.png')}}" alt="bg-0">
              <p>Default</p>
            </div>
            <div class="rx-tools-item bg-1">
              <img src="{{ asset('/frontend/assets/img/tools/bg-1.png')}}" alt="bg-1">
              <p>Bg-1</p>
            </div>
            <div class="rx-tools-item bg-2">
              <img src="{{ asset('/frontend/assets/img/tools/bg-2.png')}}" alt="bg-2">
              <p>Bg-2</p>
            </div>
            <div class="rx-tools-item bg-3">
              <img src="{{ asset('/frontend/assets/img/tools/bg-3.png')}}" alt="bg-3">
              <p>Bg-3</p>
            </div>
            <div class="rx-tools-item bg-4">
              <img src="{{ asset('/frontend/assets/img/tools/bg-4.png')}}" alt="bg-4">
              <p>Bg-4</p>
            </div>
            <div class="rx-tools-item bg-5">
              <img src="{{ asset('/frontend/assets/img/tools/bg-5.png')}}" alt="bg-5">
              <p>Bg-5</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      @include('components.frontend.main-js')
 <script>
    document.addEventListener('DOMContentLoaded', function () {
      const filterBtn = document.getElementById('filterBtn');
      const sidebar = document.getElementById('mobileSidebar');
      const overlay = document.getElementById('sidebarOverlay');
      const closeBtn = document.getElementById('closeSidebar');

      filterBtn.addEventListener('click', () => {
        sidebar.classList.add('open');
        overlay.classList.add('show');
      });

      overlay.addEventListener('click', () => {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
      });

      closeBtn.addEventListener('click', () => {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
      });
    });
  </script>
  <script>
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("colorSearchInput");
    const dropdown = document.getElementById("colorSearchDropdown");
    const colorOptions = dropdown.querySelectorAll(".color-option");
    const selectedColorDisplay = document.getElementById("selectedColorDisplay");

    searchInput.addEventListener("input", function () {
        const filter = this.value.toLowerCase();
        let hasMatch = false;

        colorOptions.forEach(option => {
            const text = option.textContent.toLowerCase();
            if (text.includes(filter)) {
                option.style.display = "block";
                hasMatch = true;
            } else {
                option.style.display = "none";
            }
        });

        dropdown.classList.toggle("show", hasMatch);
    });

    colorOptions.forEach(option => {
        option.addEventListener("click", function (e) {
            e.preventDefault();
            const color = this.dataset.color;
            searchInput.value = color;
            selectedColorDisplay.innerHTML = `<strong>Selected Color:</strong> ${color}`;
            dropdown.classList.remove("show");

            // Optional: trigger form submit here if required
            // document.getElementById("filterForm").submit();
        });
    });

    // Hide dropdown when clicking outside
    document.addEventListener("click", function (e) {
        if (!searchInput.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.remove("show");
        }
    });
});
</script>
<script>
$(document).ready(function() {

    function applyFilters(formSelector) {
        const form = $(formSelector);

        const tc_name = form.find('select[name="tc_name"]').val();
        const age_group = form.find('select[name="age_group"]').val();
        const collection_name = form.find('select[name="collection_name"]').val();

        const fabric_types = form.find('.fabric-type-check:checked').map(function() {
            return $(this).val();
        }).get();

        const colors = $('.color-option.active, .color-option-mobile.active').map(function() {
            return $(this).data('color');
        }).get();

        const size = form.find('.size-btn.active').data('size-id') || null;

        const min_price = form.find('#minPriceDesktop').val() || form.find('#minPriceMobile').val();
        const max_price = form.find('#maxPriceDesktop').val() || form.find('#maxPriceMobile').val();

        $.ajax({
            url: "{{ route('allproducts_inside.filter') }}",
            method: "GET",
            data: {
                tc_name,
                age_group,
                collection_name,
                fabric_types,
                colors,
                size,
                min_price,
                max_price
            },
            beforeSend: function() {
                $('#productResults').html('<div class="text-center w-100">Loading...</div>');
            },
            success: function(response) {
                $('#productResults').html('<div class="row mb-minus-24 room-popup">' + response + '</div>');
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                $('#productResults').html('<div class="text-center w-100 text-danger">Error loading products.</div>');
            }
        });
    }

    $('#desktopFilterForm button[type="submit"]').on('click', function(e) {
        e.preventDefault();
        applyFilters('#desktopFilterForm');
    });

    $('#mobileFilterForm button[type="submit"]').on('click', function(e) {
        e.preventDefault();
        applyFilters('#mobileFilterForm');
        $('#mobileSidebar').removeClass('active');
        $('#sidebarOverlay').fadeOut();
    });

    $(document).on('click', '.size-btn', function(e) {
        e.preventDefault();
        $(this).closest('.list-inline').find('.size-btn').removeClass('active');
        $(this).addClass('active');
    });

    $(document).on('click', '.color-option, .color-option-mobile', function(e) {
        e.preventDefault();
        $(this).toggleClass('active');
    });
});
</script>



</body>

</html>